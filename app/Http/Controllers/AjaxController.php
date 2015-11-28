<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class AjaxController extends Controller
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
     * Return atocomplete
     *
     * @param string regex
     * @return array result
     */    
    public function autocomplete(Request $request)
    {
        if( $request->isMethod('post') )
            return  json_encode(
                        App\Product::where('product_name', 'regexp', $request->input('pattern'))->limit(5)->get()->toArray()
                    );
        return '403';
    }
}
