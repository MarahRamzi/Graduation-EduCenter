<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Event;
use App\Models\Major;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $c_count = Category::count();
        $co_count = Course::count();
        $e_count = Event::count();
        $m_count = Major::count();
        $t_count = Teacher::count();
        $u_count = User::count();
        $s_count  = Student::count();
        $user = Auth::user();
        $enrolledCourses = collect();
        $teachingCourses = collect();
        $student_id = $user->student->id ?? $user->id ;
        if ($user->hasRole(Role::ROLE_STUDENT) || $user->hasAbility('enroll_courses')) {
            $enrolledCourses = Registration::where('student_id', $student_id)
            ->with('course')
            ->get()
            ->pluck('course');
        }
 
        if ($user->hasRole(Role::ROLE_TEACHER)) {
            $teacher = $user->teacher;
            $teachingCourses = Course::where('teacher_id', $user->teacher->id)->get();
        }

       
        return view('admin.index', compact('s_count','c_count', 'co_count', 'e_count', 'm_count', 't_count', 'enrolledCourses', 'teachingCourses','user'));
    }
}
