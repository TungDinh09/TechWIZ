<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('deliveries')->insert([
            ['Name' => 'Vaginal delivery'],
            ['Name' => 'Assisted delivery'],
            ['Name' => 'C-Section'],
            ['Name' => 'VBAC'],


        ]);
    }
}