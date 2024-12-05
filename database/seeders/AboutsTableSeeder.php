<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        About::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('abouts')->insert([
            [
                'image' => 'about_us.png',
                'title' => 'Who We Are',
                'description' => 'An educational platform for everyone.',
                'btn_text' => 'Learn More',
                'btn_link' => '/about',
            ],
        ]);
    }
}
