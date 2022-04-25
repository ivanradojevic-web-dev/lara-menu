<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionShow extends Controller
{
    public function __invoke($uuid)
    {
        $transaction = Transaction::with('currency', 'convert_currency')
        	->where('uuid', $uuid)
        	->first();

        if(!$transaction) {
        	abort(404);
        }

        return view('transaction_show', compact('transaction')); 
    }
}
