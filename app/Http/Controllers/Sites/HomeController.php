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
            'sections' => App\Section::where('parent_id', 0),
            'priceRange' => [
                App\Product::orderBy('price', 'ASC')->limit(1),
                App\Product::orderBy('price', 'DESC')->limit(1),
            ],
            'favProducts' => App\Product::limit(6),
        ]);  
    }
}
