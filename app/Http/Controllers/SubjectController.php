<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Subject $subject, Request $request)
    {
        if($request->user()->cannot('view', $subject)){
            abort(403);
        }else{
        return view('subjects.index')->with('subjects', $subject->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create', Subject::class)){
            abort(403);
        }else{
            return view('subjects.create');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
       if($request->isMethod('post')) {
            $data = $request->except('_token');
            $obj = new Subject;
            $obj->insert($data);
            return redirect('teacher/subjects');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id){
        if($request->user()->cannot('edit', Subject::class)){
            abort(403);
        }else
            return view('subjects.edit')->with('subject', Subject::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        if($request->user()->cannot('update', Subject::class)){
            abort(403);
        }else{
            $data = $request->except('_token');
            $Obj = $subject->find($request->id);
            $Obj->update($data);
            return redirect('teacher/subjects');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if($request->user()->cannot('delete', Subject::class)){
            abort(403);
        }else
            Subject::destroy($id);
            return redirect('teacher/subjects');
    }
}
