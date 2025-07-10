<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Đã xóa toàn bộ logic liên quan đến ContactModel và countContactsUnread
        // Không truyền unreadCount/unreadContacts vào view sidebar nữa
    }
}
