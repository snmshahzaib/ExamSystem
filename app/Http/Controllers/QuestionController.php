<?php

namespace App\Http\Controllers;

use App\Models\Subjective;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Mcq;
use App\Models\Subject;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
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
            return view('questions.index', $data);
        }
    }
}
