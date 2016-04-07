<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('admin/index', [
            'title' => 'Admin'
        ]);  
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

    public function statistics() {

        // Getting data about top 3 products
        $products = App\Product::orderBy('clicks', 'desc')
                    ->limit(3)
                    ->select(['id', 'item_id', 'clicks', 'views'])
                    ->get()
                    ->toArray();
        foreach ($products as $key => $product) {
            $products[$key]['img'] = App\Product::find( $product['id'] )->images()->first()->toArray()['url'];
        }

        // Total clicks and earned money
        $total['clicks'] = App\Product::sum('clicks');
        $total['earned'] = 0;

        // Getting data about shops + clicks per shop
        $shops_query = App\Shop::orderBy('name', 'desc')
                                ->select(['id', 'name', 'earned'])->get();
        $shops = [];

        foreach ($shops_query as $shop) {
            $shops[] = [
                'id' => $shop->id,
                'name' => $shop->name,
                'earned' => $shop->earned,
                'clicks' => round(
                            App\Product::where('shop_id', '=', $shop->id)->sum('clicks'), 2)
            ];
            $total['earned'] += $shop->earned;
        }
        
        return \View::make('admin/statistics', [
            'title' => 'Statistiky',
            'top_products' => $products,
            'shops' => $shops,
            'total' => $total
        ]);  
    }
}
