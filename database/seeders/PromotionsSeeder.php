<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            'name' => 'Black Friday ',
            'start_date' => '2020-12-01',
            'end_date' => '2020-12-18',
        ]);

        DB::table('promotions')->insert([
            'name' => 'Promos de Noël ',
            'start_date' => '2020-12-19',
            'end_date' => '2020-12-31',
        ]);
    }
}
