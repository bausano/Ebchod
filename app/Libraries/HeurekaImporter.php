<?php

namespace App\Libraries;

class HeurekaImporter
{
	private $xml;

    public function loadXml( $ixml ) { 
    	/*
    	* Formating the XML structure of sent file
		*/
		$doc = new \DOaMDocument();
        $doc->loadXML( $xml );

        $elements = $doc->getElementsByTagName('SHOPITEM');
        $data = array();

        /*
		*
        */
        foreach($elements as $node) {
            $id = trim( $node->getElementsByTagName('ITEM_ID')->item(0)->nodeValue );
            foreach($node->childNodes as $child) {
                if( trim( $child->nodeValue ) != '' ) {
                    switch( $child->nodeName ) {
                        case 'DELIVERY':
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
        var_dump( $data );*/
    }
}
