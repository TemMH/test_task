<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AppreciationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        DB::table('appreciation_types')->insert([
            ['name' => 'Тип благодарности 1'],
            ['name' => 'Тип благодарности 2'],
            ['name' => 'Тип благодарности 3'],
            ['name' => 'Тип благодарности 4'],
            ['name' => 'Тип благодарности 5'],
            ['name' => 'Тип благодарности 6'],
            ['name' => 'Тип благодарности 7'],
            ['name' => 'Тип благодарности 8'],
            ['name' => 'Тип благодарности 9'],
            ['name' => 'Тип благодарности 10'],

        ]);
    }
}
