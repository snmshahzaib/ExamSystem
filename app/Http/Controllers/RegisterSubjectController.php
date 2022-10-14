<?php

namespace App\Http\Controllers;

use App\Models\RegisterSubject;
use App\Models\Subject;
use App\Http\Requests\StoreRegisterSubjectRequest;
use App\Http\Requests\UpdateRegisterSubjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->cannot('view', RegisterSubject::class)){
            abort(403);
        }else
            $data['regSubjects'] = RegisterSubject::where('student_id', Auth::user()->id)->get();
            return view('registersubjects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create', RegisterSubject::class)){
            abort(403);
        }else
            return view('registersubjects.create')->with('subjects', Subject::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisterSubjectRequest $request)
    {
        $data = $request->except('_token');
        $data['student_id'] = Auth::user()->id;
        $obj = new RegisterSubject;
        $obj->insert($data);
        return redirect('student/registersubjects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterSubject $registerSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterSubject $registerSubject, $id, Request $request)
    {
        if($request->user()->cannot('edit', RegisterSubject::class)){
            abort(403);
        }else
            $data['reg_Subject'] = $registerSubject->find($id);
            $data['subjects'] = Subject::all();
            return view('registersubjects.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegisterSubjectRequest  $request
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisterSubjectRequest $request, $id)
    {
        $data = $request->except('_token');
        $Obj = RegisterSubject::find($id);
        $Obj->update($data);
        return redirect('student/registersubjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterSubject  $registerSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterSubject $registerSubject, $id, Request $request)
    {
        if($request->user()->cannot('delete', RegisterSubject::class)){
            abort(403);
        }else
            $registerSubject->destroy($id);
            return redirect('student/registersubjects');
    }
}
