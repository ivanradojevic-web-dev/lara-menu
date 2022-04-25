<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExchangeRate extends Pivot
{
    protected $table = 'exchange_rates';

    protected function rate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 1000000,
            set: fn ($value) => $value * 1000000,
        );
    }

    protected function surcharge(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 10,
            set: fn ($value) => $value * 10,
        );
    }

    protected function discount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 10,
            set: fn ($value) => $value * 10,
        );
    }
}
