<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('user.layouts.footer', function ($view) {
            $latestBlogs = Blog::latest()->take(2)->get();
            $view->with('latestBlogs', $latestBlogs);
        });
    }
}
