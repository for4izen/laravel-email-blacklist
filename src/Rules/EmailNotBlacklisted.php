<?php

namespace For4izen\LaravelEmailBlacklist\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailNotBlacklisted implements Rule
{
    public function passes($attribute, $value): bool
    {
        $domain = strtolower(substr(strrchr($value, '@'), 1));

        return !in_array($domain, config('email-blacklist.domains', []));
    }

    public function message(): string
    {
        return 'Este email não é permitido.';
    }
}

