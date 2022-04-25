<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class ExchangeRatesBoard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //Hardcoded for test-project purpose
        $currency = Currency::findOrFail(1);

        $convert_currencies = $currency
            ->convert_currencies()
            ->get();

        return view('app', compact('currency', 'convert_currencies'));
    }
}
