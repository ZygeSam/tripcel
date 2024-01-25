<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = [
            [
                "gateway" => "Paystack",
                "rates" => 1300.00,
                'countries' => json_encode([])
            ],
            [
                "gateway" => "TransactionCloud",
                "rates" => 0.00,
                'countries' => json_encode([])
            ],
        ];
         \App\Models\Rates::insert($rates);
    }
}
