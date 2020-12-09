<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        for ($i=0; $i<=9; $i++){
            DB::table('products')->insert(['name' => 'Produit ' . ($i+1),
                'short_description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques',
                'description' => 'Replongez vous dans le passé, grasse a ce magnifique produit',
                'image' => 'img1.jpg',
                'price' => 99.99,
                'weight' => 3.525,
                'stock' => 15,
                'range_id' => 1
            ]);
        }

        for ($i=0; $i<=4; $i++){
            DB::table('products')->insert(['name' => 'Arlicle ' . ($i+1),
                'short_description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques',
                'description' => 'Replongez vous dans le passé, grasse a ce magnifique produit',
                'image' => 'img1.jpg',
                'price' => 59.99,
                'weight' => 0.565,
                'stock' => 15,
                'range_id' => 2
            ]);
        }

        for ($i=0; $i<=4; $i++){
            DB::table('products')->insert(['name' => 'Objet ' . ($i+1),
                'short_description' => 'Produit vintadge, pour les collectionneurs et les nostalgiques',
                'description' => 'Replongez vous dans le passé, grasse a ce magnifique produit',
                'image' => 'img1.jpg',
                'price' => 199.99,
                'weight' => 25,
                'stock' => 15,
                'range_id' => 3
            ]);
        }
    }
}