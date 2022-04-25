<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currency_id' => 'required',
            'convert_currency_id' => 'required',
            'convert_currency_rate' => 'required',
            'surcharge_percentage' => 'required',
            'surcharge_amount' => 'required',
            'currency_amount' => 'required',
            'convert_currency_amount' => 'required',
            'paid_currency_amount' => 'required',
            'discount_percentage' => 'required',
            'discount_amount' => 'required',
        ];
    }
}
