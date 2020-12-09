<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RangesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=2; $i++){
            DB::table('ranges')->insert(['range' => 'Gamme n° ' . ($i+1)]);
        }
    }
}