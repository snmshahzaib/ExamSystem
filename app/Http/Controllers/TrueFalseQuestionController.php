<?php

namespace App\Http\Controllers;

use App\Models\TrueFalseQuestion;
use App\Http\Requests\StoreTrueFalseQuestionRequest;
use App\Http\Requests\UpdateTrueFalseQuestionRequest;
use App\Models\Paper;
use Illuminate\Http\Request;
use App\Classes\UnsetToken;

class TrueFalseQuestionController extends Controller
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
    public function index()
    {
        return abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create', TrueFalseQuestion::class)){
            abort(403);
        }else
            $data['papers'] = Paper::all();
            return view('questions.truefalsequestion.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrueFalseQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrueFalseQuestionRequest $request, TrueFalseQuestion $trueFalseQuestion)
    {
        $data = $request->except('_token');
        $data['type'] = 'truefalse';
        $trueFalseQuestion->create($data);
        return redirect('teacher/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrueFalseQuestion  $trueFalseQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(TrueFalseQuestion $trueFalseQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrueFalseQuestion  $trueFalseQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data['tf'] = TrueFalseQuestion::find($id);
        if($request->user()->cannot('edit', $data['tf'])){
            abort(403);
        }else
            $data['papers'] = Paper::all();
            return view('questions.truefalsequestion.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrueFalseQuestionRequest  $request
     * @param  \App\Models\TrueFalseQuestion  $trueFalseQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrueFalseQuestionRequest $request, $id)
    {
        if($request->user()->cannot('edit', TrueFalseQuestion::find($id))){
            abort(403);
        }else
            $data = $request->except('_token');
            $data['type'] = 'truefalse';
            $obj = TrueFalseQuestion::find($id);
            $obj->update($data);
            return redirect('teacher/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrueFalseQuestion  $trueFalseQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if($request->user()->cannot('delete', TrueFalseQuestion::find($id))){
            abort(403);
        }else
            TrueFalseQuestion::destroy($id);
            return redirect('teacher/questions');
    }
}
