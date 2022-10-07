<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Subject;
use App\Models\Paper;

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
    public function index(User $user)
    {
        if (Gate::allows('isTeacher', $user)) {
            return redirect('teacher/dashboard');
        }else{
            return redirect('student/dashboard');
        }
    }
    public function isStudent(User $user){
        if (Gate::authorize('isStudent', $user))
            $data['subjects'] =  Subject::count();
            $data['papers'] = Paper::count();
            return view('index', $data);
    }
    public function isTeacher(User $user){
        if (Gate::authorize('isTeacher', $user))
            $data['subjects'] =  Subject::count();
            $data['papers'] = Paper::count();
            return view('index', $data);
    }
}
