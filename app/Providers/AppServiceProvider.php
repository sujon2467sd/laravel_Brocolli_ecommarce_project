<?php

namespace App\Providers;

use App\Models\logo;
use App\Models\OrderItem;
use App\Models\OrderTable;
use App\Models\ContactMessage;
use App\Models\TopMenuSetting;
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
        View::composer(['frontend.master'],function($view){
            $view ->with( 'top_menu' ,TopMenuSetting::first());
            $view ->with( 'logos' ,logo::first());

        });
        // View::share('top_menu', TopMenuSetting::first());

        View::composer(['admin.master'],function($view){
            $view ->with( 'logo' ,logo::first());

            $view ->with( 'pending_count' ,OrderTable::where('status', 'pending')->count());
            $view ->with( 'confirm_count' ,OrderTable::where('status', 'confirmed')->count());
            $view ->with( 'delivered_count' ,OrderTable::where('status', 'delivered')->count());
            $view ->with( 'cancel_count' ,OrderTable::where('status', 'cancelled')->count());
            $view ->with( 'all_count' ,OrderTable::count());
            $view ->with( 'messeges' ,ContactMessage::get());

        });

    }
}