<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return \View::make('home', [
            'title' => 'Home',
            'favorites' => App\Product::orderBy('views', 'desc')->limit(9)->get(),
            'posts' => App\Blog::select()->orderBy('id', 'desc')->limit(2)->get()
        ]);  
    }
}
