<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Libraries\HeurekaImporter;

class XMLfeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * XML Import Heureka
     * SHOPS: bibloo.cz - https://www.bibloo.cz/_upload/heureka.php?cj
     *
     * @return \Illuminate\Http\Response
     */
    public function heurekaImport()
    {
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 300);
        $model = new HeurekaImporter();
        /*$xml = file_get_contents('https://www.bibloo.cz/_upload/heureka.php?cj');

        $doc = new \DOaMDocument();
        $doc->loadXML( $xml );
        $pokus = $doc->childNodes->item(0);
        $elements = $doc->getElementsByTagName('SHOPITEM');
        $data = array();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
