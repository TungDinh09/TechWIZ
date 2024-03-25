<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('payments')->insert([
            ['PaymentName' => 'Cash'],
            ['PaymentName' => 'Debit Card'],
            ['PaymentName' => 'Money Orders'],
            ['PaymentName' => 'Wire Transfer'],


        ]);
    }
}