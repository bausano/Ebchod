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
        if ($request->isMethod('post')) 
        {
            if(null == ($order = explode("-", $request->order)) || count($order) != 2)
                $order = ['views', 'desc'];
            
            $query = App\Product::orderBy($order[0], $order[1]);

            if (null != ($pattern = urldecode($request->input('pattern'))))
                $query->where('product_name', 'regexp', $pattern);

            if (null != ($min = $request->input('min')) && null != ($max = $request->input('max')))
                $query->where('price', '>=', $min)->where('price', '<=', $max);

            if (null != ($section = urldecode($request->input('section'))))
                $query->where('section_id', $section);

            $products = $query->skip((int) $request->input('offset'))->take((int) $request->input('limit'))->get()->toArray();

            foreach ($products as $key => $product) {
                $products[$key]['img'] = App\Product::find( $product['id'] )->images()->first()->toArray()['url'];
            }

            return json_encode(
                $products
            );
        }
        return '403';
    }

    public function eshopRefer(Request $request)
    {
        if( $request->isMethod('post') ) {
            $id = $request->input('id');
            $query = App\Product::where('id', $id)->increment('clicks');
        }
    }
}