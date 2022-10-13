<?php

namespace App\Http\Controllers;

use App\Classes\Answer;
use App\Models\AttemptExam;
use App\Http\Requests\StoreAttemptExamRequest;
use App\Http\Requests\UpdateAttemptExamRequest;
use App\Models\Paper;
use App\Models\RegisterSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttemptExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['regSubjects'] = RegisterSubject::where('student_id', Auth::user()->id)->with('subject.papers')->get();
        return view('attemptexam.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['paper'] = Paper::find($request->paper_id);
        return view('attemptexam.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttemptExamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttemptExamRequest $request, Answer $answer)
    {
        $answer->store($request);
        return redirect('student/attemptexams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttemptExam  $attemptExam
     * @return \Illuminate\Http\Response
     */
    public function show(AttemptExam $attemptExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttemptExam  $attemptExam
     * @return \Illuminate\Http\Response
     */
    public function edit(AttemptExam $attemptExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttemptExamRequest  $request
     * @param  \App\Models\AttemptExam  $attemptExam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttemptExamRequest $request, AttemptExam $attemptExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttemptExam  $attemptExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttemptExam $attemptExam)
    {
        //
    }
}
