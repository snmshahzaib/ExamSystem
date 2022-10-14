<?php

namespace App\Http\Controllers;


use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Paper;
use App\Models\RegisterSubject;
use App\Services\StoreAnswerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
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
    public function index(Request $request)
    {
        if($request->user()->cannot('view', Answer::class)){
            abort(403);
        }else
            $data['regSubjects'] = RegisterSubject::where('student_id', Auth::user()->id)->with('subject.papers')->get();
            $data['answers'] = Answer::where('student_id', Auth::user()->id)->get();
            return view('answers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create', Answer::class)){
            abort(403);
        }else
            $data['paper'] = Paper::find($request->paper_id);
            return view('answers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnswerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerRequest $request, StoreAnswerService $answer)
    {
        // dd($request->all());
        $answers = $request->except('_token');
        $answer->store($answers);
        return redirect('student/answers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $Answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $Answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnswerRequest  $request
     * @param  \App\Models\Answer  $Answer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $Answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
