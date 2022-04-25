<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class Convert extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $currency = Currency::query()
            ->where('name', $request->query()['currency_name'])
            ->first();;

        $convert_currency = $currency
            ->convert_currencies()
            ->where('name', $request->query()['valuta_name'])
            ->first();

        $result = $request->query()['valuta_value'] / $convert_currency->pivot->rate;
        $surcharge_amount = ($result / 100 ) * $convert_currency->pivot->surcharge;
        
        $pre_price = ($result + $surcharge_amount);
        $discount_amount = ($pre_price / 100 ) * $convert_currency->pivot->discount;

        $total_price = ($pre_price - $discount_amount);

        return response()
            ->json([
                'convert_result' => round($result, 2),
                'currency_id' => $currency->id,
                'currency_code' => $currency->iso_code,
                'convert_currency_id' => $convert_currency->id,
                'convert_currency_rate' => $convert_currency->pivot->rate,
                'surcharge_percentage' => $convert_currency->pivot->surcharge,
                'surcharge_amount' => round($surcharge_amount, 2),
                'convert_currency_amount' => $request->query()['valuta_value'],
                'convert_currency_code' => $convert_currency->iso_code,
                'paid_currency_amount' => round($total_price, 2),
                'discount_percentage' => $convert_currency->pivot->discount,
                'discount_amount' => round($discount_amount, 2),
            ]);
    }
}
