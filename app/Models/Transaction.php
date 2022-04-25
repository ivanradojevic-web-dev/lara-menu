<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

	protected $table = 'transactions';

	public function currency()
	{
	    return $this->belongsTo(Currency::class, 'currency_id');
	}

	public function convert_currency()
	{
	    return $this->belongsTo(Currency::class, 'convert_currency_id');
	}

    protected function convertCurrencyRate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 1000000,
            set: fn ($value) => $value * 1000000,
        );
    }

    protected function surchargePercentage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 10,
            set: fn ($value) => $value * 10,
        );
    }

    protected function surchargeAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }

    protected function convertCurrencyAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }

    protected function currencyAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }

    protected function paidCurrencyAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }

    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 10,
            set: fn ($value) => $value * 10,
        );
    }

    protected function discountAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 10,
            set: fn ($value) => $value * 10,
        );
    }
}
