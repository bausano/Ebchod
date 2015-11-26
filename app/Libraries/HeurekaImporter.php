<?php

namespace App\Libraries;

/**
 *	A class for parsing heureka-like xml feed 
 */

class HeurekaImporter
{
	private $data;

    public function loadXml( $xml )
    { 
    	/**
    	 *	Formating XML structure of sent file
		 */
		$doc = new \DOaMDocument();
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
                            $data[ $id ][ $child->nodeName ][] = [ $main => $value ];
                            break;

                        case 'IMGURL_ALTERNATIVE':
                            $url = $child->childNodes->item(0)->nodeValue;
                            $data[ $id ][ $child->nodeName ][] = $url;
                            break;

                        default:
                            $data[ $id ][ $child->nodeName ] = $child->nodeValue;
                    }
                }
            }
        }
        var_dump( $data );

        $this->data = $data;
    }

    public function getData()
    {
    	return $this->xml;
    }

    public function setProductData( Product $product )
    {
    	foreach( $this->data as $column => $value )
    	{
            switch( $child->nodeName )
            {
                case 'PARAM':

                	break;

				case 'IMGURL_ALTERNATIVE':
                
                	break;

                default:
                	$product->set(  );
            }
    	}
    }

    private function paramToColumn( $string )
    {

		$heureka_params = [
            'ITEM_ID' => 'product_id',
            'ITEMGROUP_ID' => 'item_group',
            'PRODUCTNAME' => 'product_name',
            'PRODUCT' => 'display_name',
            'DESCRIPTION' => 'description',
            '' => 'manufacturer',
            '' => 'url',
            '' => 'price',
            '' => 'category',
            '' => 'delivery_date',
            'GIFT' => 'gift',
        ];

    	return $heureka_params [ $string ];
    }
}
