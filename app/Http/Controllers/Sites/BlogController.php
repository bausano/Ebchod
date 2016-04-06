<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('blog', [
            'title' => 'Blog',
            'sections' => App\Section::where('parent_id', 0),
            'priceRange' => [
                App\Product::min('price'),
                App\Product::max('price'),
            ],
            'favorites' => App\Product::orderBy('views', 'desc')->limit(6)->get(),   
            'posts' => App\Blog::select()->orderBy('id', 'desc')->get()
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $seo)
    {
        return \View::make('post', [
            'title' => 'Blog',
            'sections' => App\Section::where('parent_id', 0),
            'priceRange' => [
                App\Product::min('price'),
                App\Product::max('price'),
            ],
            'favorites' => App\Product::orderBy('views', 'desc')->limit(6)->get(),   
            'post' => App\Blog::select()->where('id', $id)->get()->first()
        ]); 
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
