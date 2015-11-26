<?php

namespace App\Libraries;

/**
 *	A class for parsing heureka-like xml feed 
 */

class HeurekaImporter
{
	private $data;

    private $heureka_params = [
        'ITEM_ID' => 'product_id',
        'ITEMGROUP_ID' => 'item_group',
        'PRODUCTNAME' => 'product_name',
        'PRODUCT' => 'display_name',
        'DESCRIPTION' => 'description',
        'MANUFACTURER' => 'manufacturer',
        'URL' => 'url',
        'PRICE_VAT' => 'price',
        'CATEGORYTEXT' => 'category',
        'GIFT' => 'gift'
    ];

    public function loadXml( $xml )
    { 
    	/**
    	 *	Formating XML structure of sent file
		 */
		$doc = new \DOMDocument();
        $doc->loadXML( $xml );

        $elements = $doc->getElementsByTagName('SHOPITEM');
        $data = array();

        /**
		 *	Getting a data of every shop item in feed
         */
        foreach($elements as $node)
        {
            $id = trim( $node->getElementsByTagName('ITEM_ID')->item(0)->nodeValue );
            foreach($node->childNodes as $child) {
                if( trim( $child->nodeValue ) != '' )
                {
                    switch( $child->nodeName )
                    {
                        case 'DELIVERY':
                        case 'VIDEO_URL':
                        case 'ITEM_TYPE':
                        case 'EAN':
                        case 'ISBN':
                        case 'HEUREKA_CPC':
                        case 'DELIVERY_DATE':
                        case 'ACCESSORY':
                        case 'DUES':
                        	break;

                        case 'PARAM':
                            $main = $child->childNodes->item(0)->nodeValue;
                            $value = $child->childNodes->item(1)->nodeValue;

                            $data[ $id ][ $child->nodeName ][] = [ 'param' => $main, 'value' => $value ];
                            break;

                        case 'IMGURL':
                        case 'IMGURL_ALTERNATIVE':
                            $url = $child->childNodes->item(0)->nodeValue;
                            $m = $child->nodeName == 'IMGURL' ? true : false;

                            $data[ $id ][ $child->nodeName ][] = [ 'url' => $url, 'main' => $m ];
                            break;

                        default:
                            $data[ $id ][ $child->nodeName ] = $child->nodeValue;
                    }
                }
            }
        }

        $this->data = $data;
    }

    public function getData()
    {
    	return $this->data;
    }

    public function saveProducts( )
    {
        foreach( $this->data as $item )
        {
            $product = new Product();
        	foreach( $item as $column => $value )
        	{
                switch( $column )
                {
                    case 'PARAM':
                    	$product->setParams( $value );
                    	break;

    				case 'IMGURL_ALTERNATIVE':
                    	$product->setImages( $value );
                    	break;

                    default:
                    	$product->set( $this->heureka_params( $column ), $value );
                }
        	}
            $product->save();
        }
    }
}
