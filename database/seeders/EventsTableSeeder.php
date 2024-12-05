<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Event::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('events')->insert([
            [
                'image' => 'science_fair.png',
                'location' => 'Hall A',
                'description' => 'Join the annual science fair.',
            ],
            [
                'image' => 'art_exhibition.png',
                'location' => 'Gallery 2',
                'description' => 'Explore the latest art exhibition.',
            ],
        ]);
    }
}
