<?php

namespace App\Services;

use Illuminate\Support\Str;

class UniqueIdentifierGenerator
{
    public static function generate(): string
    {
        return Str::uuid()->toString();
    }
}