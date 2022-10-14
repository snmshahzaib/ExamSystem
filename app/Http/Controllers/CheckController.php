<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\RegisterSubject;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data['answers'] = Answer::all();
        $data['lists'] = RegisterSubject::all();
        return view('check.index', $data);
    }
}