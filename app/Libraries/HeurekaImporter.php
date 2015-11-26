<?php

namespace App\Libraries;

use App;
/**
 *	A class for parsing heureka-like xml feed 
 */

class HeurekaImporter
{
	private $data;

    private $paramsToColumns = [
        'ITEM_ID' => 'item_id',
        'ITEMGROUP_ID' => 'item_group',
        'PRODUCTNAME' => 'product_name',
        'PRODUCT' => 'display_name',
        'DESCRIPTION' => 'description',
        'MANUFACTURER' => 'manufacturer',
        'URL' => 'url',
        'PRICE_VAT' => 'price',
        'CATEGORYTEXT' => 'section_id',
        'GIFT' => 'gift',
        'VARIATIONS' => 'variations',
        'SHOP_ID' => 'shop_id'
    ];

    public function uploadProducts( $xml )
    { 
    	/**
    	 *	Formating XML structure of sent file
		 */
		$doc = new \DOMDocument();
        $doc->loadXML( $xml );

        $elements = $doc->getElementsByTagName('SHOPITEM');
        $data = array( 'IMGURLS' => [], 'SHOP_ID' => 1 );
        $item_groups = array( );
        /**
		 *	Getting a data of every shop item in feed
         */
        foreach($elements as $node)
        {
            foreach($node->childNodes as $child)
            {
                if( trim( $child->nodeValue ) != '' )
                {
                    switch( $child->nodeName )
                    {
                        case 'ITEM_ID':
                        case 'ITEMGROUP_ID':
                        case 'PRODUCTNAME':
                        case 'PRODUCT':
                        case 'DESCRIPTION':
                        case 'MANUFACTURER':
                        case 'URL':
                        case 'PRICE_VAT':
                        case 'CATEGORYTEXT':
                        case 'GIFT':
                            $data[ $child->nodeName ] = $child->nodeValue;
                            break;

                        /*case 'PARAM':
                            $main = $child->getElementsByTagName( 'PARAM_NAME' )->item(0)->nodeValue;
                            $value = $child->getElementsByTagName( 'VAL' )->item(0)->nodeValue;
                            $data[ $child->nodeName ][] = [ 'param' => $main, 'value' => $value ];
                            break;*/

                        case 'IMGURL':
                        case 'IMGURL_ALTERNATIVE':
                            if( count( $data[ 'IMGURLS' ] < 2 ) )
                            {
                                $url = $child->childNodes->item(0)->nodeValue;
                                $m = $child->nodeName == 'IMGURL' ? true : false;

                                $data[ 'IMGURLS' ][] = [ 'url' => $url, 'main' => $m ];
                            }
                            break;
                        
                        case 'CATEGORYTEXT':
                            $data[ 'CATEGORYTEXT' ] = Section::parse( $child->nodeValue );
                            break;

                        default: continue;
                    }
                }
            }

            /**
             *  IF#1
             *  Checks if the product has variations
             */
            if( isset( $data[ 'ITEMGROUP_ID' ] ) )
            {
                /**
                 *  IF#2
                 *  Checks if it is the very first occurence of item group
                 */
                if( isset( $item_groups [ $data[ 'ITEMGROUP_ID' ] ] ) )
                {
                    /**
                     *  IF#3
                     *  If there is already one product of this item group in DB
                     *  scripts increments number of variations it has by one.
                     */
                    if( !$item_groups [ $data[ 'ITEMGROUP_ID' ] ][ 'id' ]  === false ) {
                        $id = App\Product::  where( 'shop_id' , $data[ 'SHOP_ID' ] )
                                ->where( 'item_id' , $item_groups [ $data[ 'ITEMGROUP_ID' ] ]['id'] )
                                ->value('id');

                        App\Product::  where( 'shop_id' , $data[ 'SHOP_ID' ] )
                                        ->where( 'item_id' , $item_groups [ $data[ 'ITEMGROUP_ID' ] ]['id'] )
                                        ->increment('variations');
                        /**
                         *  IF#4
                         *  Saving new product picture to the DB.
                         */
                        if( isset( $data[ 'IMGURLS' ] ) && count( $data[ 'IMGURLS' ] ) > 0 )
                        {
                            /**
                             *  IF#5
                             *  We don't want to have multiple rows with same url in our DB
                             */
                            if( App\Image::select('id')
                                    ->where( 'product_id', $id )
                                    ->where( 'url', $data[ 'IMGURLS' ][0]['url'] )
                                    ->count() == 0
                            )
                            {
                                App\Image::insert( [ 'product_id' => $id, 'url' => $data[ 'IMGURLS' ][0]['url'], 'main' => 0 ] );
                            }
                        }
                    /**
                     *  Since there is not a single product of this 
                     *  item group in db, we have to create one.
                     */
                    } else {
                        /**
                         *  IF#6
                         *  If there is not a single avaible image, we increment group variations.
                         */
                        if( count( $data[ 'IMGURLS' ] ) < 1 )
                        {
                            $item_groups [ $data[ 'ITEMGROUP_ID' ] ][ 'count' ]++;
                        }
                        /**
                         *  The conditions for a new product were fulfilled
                         *  thus the script is storing the product with appropriate number of variations
                         */
                        else
                        {
                            $data[ 'VARIATIONS' ] = $item_groups [ $data[ 'ITEMGROUP_ID' ] ][ 'count' ];
                            $item_groups [ $data[ 'ITEMGROUP_ID' ] ][ 'id' ] = $data[ 'ITEM_ID' ];
                            $this->saveProduct( $data );
                        }
                    }
                }
                else 
                {
                    /**
                     *  If there was no variation for this item group ID found before
                     *  script creates a note in item_group array.
                     */
                    $set = count ( $data[ 'IMGURLS' ] ) > 0 ? $data['ITEM_ID'] : false ;
                    $item_groups [ $data[ 'ITEMGROUP_ID' ] ] = [ 'count' => 0, 'id' => $set ];
                    /**
                     *  IF#7
                     *  Script won't save product unless it has at least one image avaible.
                     */
                    if( !$set === false )
                    {
                        $this->saveProduct( $data );
                    }
                }
            }
            else 
            {
                /**
                 *  IF#8
                 *  Products without variations and with avaible images are stored.
                 */
                if( count( $data[ 'IMGURLS' ] ) > 0 )
                {
                    $this->saveProduct( $data );
                }
            }

            $data = array( 'IMGURLS' => [], 'SHOP_ID' => 1 );
        }
    }

    private function saveProduct( $item )
    {
            $product = new Product();

        	foreach( $item as $column => $value )
        	{
                switch( $column )
                {
                    /*case 'PARAM':
                    	$product->setParams( $value );
                    	break;*/

    				case 'IMGURLS':
                    	$product->setImages( $value );
                    	break;

                    case 'ITEM_ID':
                        $product->item_id = $value;
                        break;

                    case 'SHOP_ID':
                        $product->shop_id = $value;
                        break;

                    default:
                    	$product->set( $this->paramsToColumns[ $column ], $value );
                }
        	}
            $product->save();
    }
}
