<?php

namespace For4izen\EmailBlackList\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailNotBlacklisted implements Rule
{
    protected array $domains;

    public function __construct()
    {
        $this->domains = config('email-blacklist.domains', []);
    }

    public function passes($attribute, $value): bool
    {
        if (!str_contains($value, '@')) {
            return false;
        }

        $domain = strtolower(substr(strrchr($value, '@'), 1));

        return !in_array($domain, $this->domains, true);
    }

    public function message(): string
    {
        return 'Este e-mail não é permitido.';
    }
}
