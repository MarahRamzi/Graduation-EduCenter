<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Student::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('students')->insert([
            [
                'name' => 'Mohamed Ali',
                'major' => 'Physics',
                'no_phone' => '123456789',
                'registration_id' => 1,
                'course_id' => 1,
                'teacher_id' => 1,
                'major_id' => 1,
            ],
            [
                'name' => 'Ahmed Hassan',
                'major' => 'Arts',
                'phone_no' => '987654321',
                'registration_id' => 2,
                'course_id' => 2,
                'teacher_id' => 2,
                'major_id' => 2,
            ],
        ]);
    }
}
