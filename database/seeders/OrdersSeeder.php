<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=9; $i++){
            DB::table('orders')->insert(['order_number' => '2515 ',
                'order_amount' => '150',
                'order_date' => '',
                'user_id' => 1,
            ]);
        }
        for ($i=0; $i<=9; $i++){
            DB::table('orders')->insert(['order_number' => '3521 ',
                'order_amount' => '40',
                'order_date' => '',
                'user_id' => 1,
            ]);
        }
        for ($i=0; $i<=9; $i++){
            DB::table('orders')->insert(['order_number' => '5684 ',
                'order_amount' => '100',
                'order_date' => '',
                'user_id' => 1,
            ]);
        }
    }
}