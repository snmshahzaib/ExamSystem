<?php

namespace App\Http\Controllers;

use App\Models\Subjective;
use App\Models\Question;
use App\Models\Mcq;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\Request;


class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request, Question $question)
    {
        if($request->user()->cannot('view', $question)){
            abort(403);
        }else{
            $data['subjectives'] = Subjective::all();
            $data['mcqs'] = Mcq::all();
            $data['truefalse'] = TrueFalseQuestion::all();
            return view('questions.index', $data);
        }
    }
}
