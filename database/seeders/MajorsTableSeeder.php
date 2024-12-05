<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Major::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('majors')->insert([
            ['id' => 1],
            ['id' => 2],
        ]);
    }
}
