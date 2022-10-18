<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Subject;
use App\Models\Paper;
use App\Models\RegisterSubject;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function authenticate(User $user){
    //     if (Gate::allows('isTeacher', $user)) {
    //         return redirect('teacher/dashboard');
    //     }else{
    //         return redirect('student/dashboard');
    //     }
    // }
    // public function isStudent(User $user){
    //     if (Gate::authorize('isStudent', $user))
    //         $data['total_subjects'] =  Subject::count();
    //         $data['total_papers'] = Paper::count();
    //         $data['studentdetails'] =  RegisterSubject::where('student_id', Auth::user()->id)->get();
    //         return view('index', $data);
    // }
    // public function isTeacher(User $user){
    //     if (Gate::authorize('isTeacher', $user))
    //         $data['subjects'] =  Subject::count();
    //         $data['papers'] = Paper::count();
    //         return view('index', $data);
    // }
}
