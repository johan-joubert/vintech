<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=30; $i++){
            DB::table('products')->insert(['name' => 'Produit ' . ($i+1),
                'short_description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques',
                'description' => 'Replongez vous dans le passé, grasse a ce magnifique produit',
                'image' => 'img1.jpg',
                'price' => '99.99',
                'weight' => '3.525',
                'stock' => 15,
                'range_id' => 1
            ]);
        }
    }
}