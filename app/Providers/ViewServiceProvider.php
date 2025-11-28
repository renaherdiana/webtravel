<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SocialMedia;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Variable $socials tersedia di semua view footer
        View::composer('layouts.frontend.footer', function ($view) {
            $socials = SocialMedia::where('status', 'active')->orderBy('name')->get();
            $view->with('socials', $socials);
        });
    }
}
