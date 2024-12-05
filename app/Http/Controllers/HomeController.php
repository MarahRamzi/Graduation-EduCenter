<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\About;
use App\Models\Event;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
       // $users = Auth::user();
        $users = User::first();
        $courses_slider = Course::orderByDesc('id')->take(3)->get();
        $abouts = About::orderByDesc('id')->take(1)->get();
        $courses = Course::with('teacher')->take(3)->get();
        $events = Event::orderByDesc('id')->take(3)->get();
        $teachers = Teacher::orderByDesc('id')->take(3)->get();
        $news = News::orderByDesc('id')->take(3)->get();
            



        return view('site.index', compact('courses_slider','abouts','courses','events','teachers','news','users'));
    }

   // public function login()
   // {
      //  return view('auth.login');
    //}

   // public function register()
   // {
    //    return view('auth.register');
   // }
}
