<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        News::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('news')->insert([
            [
                'image' => 'news1.png',
                'date' => '2024-11-20',
                'auther' => 'Admin',
                'title' => 'New Courses Available!',
                'description' => 'We have added exciting new courses.',
                'btn_text' => 'Check Now',
                'btn_link' => '/news/1',
            ],
        ]);
    }
}
