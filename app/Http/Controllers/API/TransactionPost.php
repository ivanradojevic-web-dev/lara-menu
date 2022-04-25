<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionPostRequest;
use App\Mail\OrderDetails;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TransactionPost extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(TransactionPostRequest $request)
    {
        $data = $request->validated();

        $data['uuid'] = Str::uuid();

        $transaction = Transaction::create($data);

        $currency = Currency::findOrFail($request->currency_id);

        $convert_currency = $currency
            ->convert_currencies()
            ->where('id', $request->convert_currency_id)
            ->first();

        if ($convert_currency->pivot->email_confirmation) {
            Mail::to('user@example.com')->send(new OrderDetails($transaction)); 
        }

        return response()
        ->json([
            'success' => true,
            'url' => route('transaction.show', $transaction->uuid),
        ]);
    }
}
