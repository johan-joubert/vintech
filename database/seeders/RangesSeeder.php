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
            DB::table('ranges')->insert(['range' => 'Gaming']);

            DB::table('ranges')->insert(['range' => 'Audio']);

            DB::table('ranges')->insert(['range' => 'Vidéo']);
    }
}