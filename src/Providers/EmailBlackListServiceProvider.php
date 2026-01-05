<?php

namespace For4izen\EmailBlackList\Providers;

use Illuminate\Support\Facades\Validator;
use For4izen\LaravelEmailBlacklist\Rules\EmailNotBlacklisted;

class EmailBlackListServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Validator::extend('email_blacklist', fn($attribute, $value) => (new EmailNotBlacklisted())->passes($attribute, $value));

        Validator::replacer('email_blacklist', function ($message) {
            return 'Este email não é permitido.';
        });

        $this->publishes([
            __DIR__ . '/../Config/email-blacklist.php' => config_path('email-blacklist.php'),
        ], 'email-blacklist');
    }
}
