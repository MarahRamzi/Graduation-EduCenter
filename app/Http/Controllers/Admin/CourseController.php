<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_courses');
        $user = Auth::user();
        $courses = Course::with('teacher')->CreatedBy()->withCount('students')->orderByDesc('id')->paginate(5);
        $teachers = Teacher::all();
        return view('admin.courses.index', compact('courses', 'teachers','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('admin.courses.create', compact('courses', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
            // 'registration_id' => 'required',
        ]);
        $data = [];
        $user =Auth::user()->load('teacher');
        $img = $request->file('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('uploads/courses'), $img_name);
        $data = [
            'image' => $img_name,
            'title' => $request->title,
            'description' => $request->description,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
            'created_by' => $user->id,
        ];
       
     
        if($user->hasRole(Role::ROLE_TEACHER)){
            $data['teacher_id'] = $user->teacher->id;
        }
       
        Course::create($data);

        return redirect()->route('admin.courses.index')->with('msg', 'Course created successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('courses', 'course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
            //  'registration_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $courses = Course::findOrFail($id);

        $img_name = $courses->image;
        if ($request->hasFile('image')) {
            $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/courses'), $img_name);
        }


        $courses->update([
            'image' => $img_name,
            'title' => $request->title,
            'description' => $request->description,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
            // 'registration_id' => $request->registration_id,
            'teacher_id' => $request->teacher_id,

        ]);

        // Redirect
        return redirect()->route('admin.courses.index')->with('msg', 'Courses updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        File::delete(public_path('uploads/courses/' . $course->image));
        $course->delete();
        return redirect()->back()->with('msg', 'Course deleted successfully')->with('type', 'danger');
    }
    public function enroll($course_id)
    {
        $user = auth()->user();

        if (!$user || (!$user->hasRole(Role::ROLE_STUDENT) && !$user->hasAbility('enroll_courses'))) {

            return redirect()->back()->with('error', 'Only students can enroll in courses.');
        }


        $course = Course::find($course_id);
        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }
        $student_id = $user->student?->id ?? $user->id;
        $alreadyEnrolled = Registration::where('student_id', $student_id)
            ->where('course_id', $course_id)
            ->exists();

        if ($alreadyEnrolled) {

            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }
        $teacherId = $course->teacher_id;

        Registration::create([
            'student_id' => $user->student?->id ?? $user->id,
            'course_id' => $course_id,
            'teacher_id' => $teacherId,
        ]);

        return redirect()->back()->with('success', 'You have successfully enrolled in the course!');
    }
    public function removeEnrollment($courseId)
    {
        $auth_user = auth()->user();
        $student = $auth_user->student ?? $auth_user;

        if (!$student) {
            return redirect()->route('admin.index')->with('error', 'Student profile not found.');
        }

        if ($student->courses()->where('courses.id', $courseId)->exists()) {
            $student->courses()->detach($courseId);

            return redirect()->route('admin.index')->with('success', 'You have successfully removed the course.');
        }

        return redirect()->route('admin.index')->with('error', 'You are not enrolled in this course.');
    }
    public function assignTeacher(Request $request)
    {
        $request->validate([
            'teacher_id' => ['required','int',  Rule::exists('teachers', 'id')],
            'course_id' => ['required','int',  Rule::exists('courses', 'id')],
        ]);
        $course = Course::find($request->course_id);

        if ($course) {
            $course->teacher_id = $request->teacher_id;
            $course->save();

            return redirect()->route('admin.courses.index')->with('success', 'Teacher assigned successfully!');
        }

        return redirect()->route('admin.courses.index')->with('error', 'Course not found.');
    }
}
