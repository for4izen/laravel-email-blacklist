<?php

namespace For4izen\LaravelEmailBlacklist\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use For4izen\LaravelEmailBlacklist\Rules\EmailNotBlacklisted;

class EmailBlacklistServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Publica o config
        $this->publishes([
            __DIR__ . '/../Config/email-blacklist.php' => config_path('email-blacklist.php'),
        ], 'email-blacklist');

        // Registra a rule no validator
        Validator::extend('email_not_blacklisted', function ($attribute, $value) {
            return (new EmailNotBlacklisted())->passes($attribute, $value);
        });
    }
}
