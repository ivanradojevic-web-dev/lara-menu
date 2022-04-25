<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpadateRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update exchange rates from API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/usd.json')->json();

        //Hardcoded for test-project purpose
        $currency = Currency::findOrFail(1);

        $convert_currencies = $currency
            ->convert_currencies()
            ->get();

        foreach ($convert_currencies as $valuta) {
            $code = strtolower($valuta->iso_code);

            try {
                $currency->convert_currencies()
                    ->syncWithPivotValues($valuta->id, ['rate' => $response['usd'][$code]], $detaching = false);

                $this->info($valuta->iso_code . " rate is updated to: " . $response['usd'][$code]);
            } catch (\Exception $e) {
                $this->info("ERROR - Something going wrong with Exchange Rate API");

                Log::info($e->getMessage());
            }
        }
        return "Exchange rates are updated";
    }
}
