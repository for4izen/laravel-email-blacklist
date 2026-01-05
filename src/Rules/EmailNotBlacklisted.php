<?php

namespace For4izen\LaravelEmailBlacklist\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailNotBlacklisted implements Rule
{
    public function passes($attribute, $value): bool
    {
        $blocked = config('email-blacklist.domains', []);

        $domain = strtolower(substr(strrchr($value, '@'), 1));

        return !in_array($domain, $blocked, true);
    }

    public function message(): string
    {
        return 'Este domínio de e-mail não é permitido.';
    }
}
