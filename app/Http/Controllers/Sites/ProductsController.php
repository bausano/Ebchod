<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('products', [
            'title' => 'Produkty',
            'sections' => App\Section::where('parent_id', 0),
            'priceRange' => [
                App\Product::min('price'),
                App\Product::max('price'),
            ],
            'favorites' => App\Product::orderBy('views', 'desc')->limit(6)->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $name = null)
    {
        App\Product::where('item_id', $id)->increment('views');

        $product = App\Product::where('item_id', $id)->get()->first();  
        return \View::make('detail', [
            'title' => 'Produkt',
            'product' => $product,
            'sections' => App\Section::where('parent_id', 0),
        ]);
    }
}
