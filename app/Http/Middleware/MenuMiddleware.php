<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class MenuMiddleware
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

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
//            if ($this->auth->user()->check()) {
            if ($this->auth->user() && $this->auth->user()->isAdmin()) {
                $menu->add('Post create ', ['url' => 'posts/create ']);
            }
        });

        \Menu::make('CategoryMenu', function ($menu) {
            // parent item
            $menu->add('Categories', ['url'  => 'categories'])->id('categories');
        });

        return $next($request);
    }
}
