<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Currency::insert([
            [
                'name'=>'dollar',
                'title'=>'United States dollar',
                'iso_code'=>'USD',
                'country'=>'USA',
                'symbol'=>'$',
            ],
            [
                'name'=>'yen',
                'title'=>'Japanese yen',
                'iso_code'=>'JPY',
                'country'=>'Japan',
                'symbol'=>'¥',
            ],
            [
                'name'=>'pound',
                'title'=>'British pound',
                'iso_code'=>'GBP',
                'country'=>'UK',
                'symbol'=>'£',
            ],
            [
                'name'=>'euro',
                'title'=>'Euro',
                'iso_code'=>'EUR',
                'country'=>'EU',
                'symbol'=>'€',
            ],
        ]);

        DB::table('exchange_rates')->insert([
            [
                'currency_id'=> 1,
                'convert_currency_id'=> 2,
                'rate'=> 107170000,
                'surcharge'=> 75,
                'email_confirmation'=> false,
                'discount' => 0
            ],
            [
                'currency_id'=> 1,
                'convert_currency_id'=> 3,
                'rate'=> 711178,
                'surcharge'=> 50,
                'email_confirmation'=> true,
                'discount' => 0
            ],
            [
                'currency_id'=> 1,
                'convert_currency_id'=> 4,
                'rate'=> 884872,
                'surcharge'=> 50,
                'email_confirmation'=> false,
                'discount' => 20
            ],
        ]);

    }
}
