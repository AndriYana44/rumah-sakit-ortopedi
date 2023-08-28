<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jam = [
            ['jam' => '01.00'],
            ['jam' => '02.00'],
            ['jam' => '03.00'],
            ['jam' => '04.00'],
            ['jam' => '05.00'],
            ['jam' => '06.00'],
            ['jam' => '07.00'],
            ['jam' => '08.00'],
            ['jam' => '09.00'],
            ['jam' => '10.00'],
            ['jam' => '11.00'],
            ['jam' => '12.00'],
            ['jam' => '13.00'],
            ['jam' => '14.00'],
            ['jam' => '15.00'],
            ['jam' => '16.00'],
            ['jam' => '17.00'],
            ['jam' => '18.00'],
            ['jam' => '19.00'],
            ['jam' => '20.00'],
            ['jam' => '21.00'],
            ['jam' => '22.00'],
            ['jam' => '23.00'],
            ['jam' => '00.00'],
        ];

        DB::table('r_jam')->insert($jam);
    }
}
