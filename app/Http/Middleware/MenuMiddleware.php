<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
use App\Post;
use App\Http\Controllers\CategoryController;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('MainMenu', function ($menu) {
            $menu->add('About',        ['url'  => 'about']);
            $menu->add('Posts',        ['url'  => 'posts']);
            $menu->add('Post create ', ['url'  => 'posts/create ']);
        });

        \Menu::make('CategoryMenu', function ($menu) {
            // parent item
            $menu->add('Categories', ['url'  => 'categories'])->id('categories');
        });

        return $next($request);
    }
}
