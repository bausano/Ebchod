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
        {
            $query = App\Product::where('product_name', 'regexp', $request->input('pattern'));

            if( null != ( $min = $request->input('min') ) && null != ( $max = $request->input('max') ) )
                $query->where('price', '>=', $min)->where('price', '<=', $max);
            if( null != ( $section = $request->input('section') ) )
                $query->where('section_id', $section);

            return  json_encode(
                        $query->limit(5)->get()->toArray()
                    );
        }
        return '403';
    }
}
