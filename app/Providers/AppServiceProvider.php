<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        return \View::share([
            'sections' => App\Section::where('parent_id', 0),
            'priceRange' => [
                App\Product::min('price'),
                App\Product::max('price'),
            ],
            'favorites' => App\Product::orderBy('views', 'desc')->limit(6)->get(),
            'latestPosts' => App\Blog::orderBy('id', 'desc')->limit(4)->get()
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
