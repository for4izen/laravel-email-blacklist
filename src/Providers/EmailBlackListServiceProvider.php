<?php

namespace For4izen\EmailBlackList\Providers;

use Illuminate\Support\ServiceProvider;

class EmailBlackListServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/email-blacklist.php'
            => config_path('email-blacklist.php'),
        ], 'email-blacklist');
    }
}
