<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Language;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
use App\Observers\OrderObserver;

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
        
        Schema::defaultStringLength(191);
        
        // Order::observe(OrderObserver::class);

        if (Schema::hasTable('languages')) {
            $languages = Language::query()
                ->where('is_active', Language::STATUS_ACTIVE)
                ->orderBy('is_default', 'desc')
                ->get();

            // $language_default = Language::query()
            //     ->where('is_default', Language::IS_DEFAULT)
            //     ->first();
        } else {
            $languages = [];
        }

        View::share([
            'languages' => $languages,
            // 'language_default' => $language_default,
        ]);
    }
}
