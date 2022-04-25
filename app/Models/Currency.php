<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function convert_currencies()
    {
        return $this->belongsToMany(Currency::class, 'exchange_rates', 'currency_id', 'convert_currency_id')
        	->using(ExchangeRate::class)
        	->withPivot('rate', 'surcharge', 'discount', 'email_confirmation');
    }
}
