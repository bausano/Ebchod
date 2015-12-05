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
     * Returns products based on given filters
     *
     * @param string regex
     * @return json result
     */    
    public function loadProducts(Request $request)
    {   
        if( $request->isMethod('post') ) 
        {
            $query = App\Product::orderBy('views', 'DESC');

            if( null != ( $pattern = $request->input('pattern') ) )
                $query->where('product_name', 'regexp', $pattern);

            if( null != ( $min = $request->input('min') ) && null != ( $max = $request->input('max') ) )
                $query->where('price', '>=', $min)->where('price', '<=', $max);

            if( null != ( $section = $request->input('section') ) )
                $query->where('section_id', $section);

            return json_encode(
                $query->skip((int) $request->input('offset'))->take($request->input('limit'))->get()->toArray()
            );
        }
        return '403';
    }
}
