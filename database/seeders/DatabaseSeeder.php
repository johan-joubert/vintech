<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsSeeder::class);
<<<<<<< HEAD

        $this->call(RangesSeeder::class);

        $this->call(PromotionsSeeder::class);

        $this->call(PromotionProductsSeeder::class);
=======
>>>>>>> fe610af564302cbe6c403ad2500cbc84d91a2609
    }
}
