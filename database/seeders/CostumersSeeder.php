<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostumersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('costumers')->insert([
        'nama'=>'dayat',
        'no_ktp'=>'532831664668377',
        'alamat'=>'pujut',
        'umur'=>'21',
        'no_telfon'=>'087323445543'
        ]);
    }
}
