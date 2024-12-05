<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Registration::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('registrations')->insert([
            [
                'student_id' => 1,
                'course_id' => 1,
                'teacher_id' => 1,
            ],
            [
                'student_id' => 2,
                'course_id' => 2,
                'teacher_id' => 2,
            ],
        ]);
    }
}
