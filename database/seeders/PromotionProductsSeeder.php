<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // PROMOTION BLACK FRIDAY
        DB::table('promotion_products')->insert([
            'discount' => 20,
            'promotion_id' => 1,
            'product_id' => 1,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 30,
            'promotion_id' => 1,
            'product_id' => 5,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 15,
            'promotion_id' => 1,
            'product_id' => 9,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 45,
            'promotion_id' => 1,
            'product_id' => 12,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 50,
            'promotion_id' => 1,
            'product_id' => 19,
        ]);


        // PROMOTION DE NOEL
        DB::table('promotion_products')->insert([
            'discount' => 20,
            'promotion_id' => 2,
            'product_id' => 3,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 30,
            'promotion_id' => 2,
            'product_id' => 7,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 15,
            'promotion_id' => 2,
            'product_id' => 11,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 45,
            'promotion_id' => 2,
            'product_id' => 15,
        ]);

        DB::table('promotion_products')->insert([
            'discount' => 50,
            'promotion_id' => 2,
            'product_id' => 17,
        ]);
    }
}
