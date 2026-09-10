<?php

namespace App\Providers;

use App\Models\SeoSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('layouts.app', function ($view) {
            $seoData = null;
            if (Schema::hasTable('seo_settings')) {
                $rawPath = request()->path();
                $normalizedPath = ($rawPath === '' || $rawPath === '/') ? '/' : '/' . ltrim($rawPath, '/');
                $seoData = SeoSetting::where('page_url', $normalizedPath)->first();
                if (!$seoData && $normalizedPath === '/') {
                    $seoData = SeoSetting::where('page_url', '/')->first();
                }
            }
            $view->with('seoData', $seoData);
        });
    }
}

