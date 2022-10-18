<?php

namespace App\Http\Controllers;

use App\Models\Subjective;
use App\Models\Paper;
use App\Http\Requests\StoreSubjectiveRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SubjectiveController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create', Subjective::class)){
            abort(403);
        }else
            $data['papers'] = Paper::all();
            return view('questions.subjectives.create', $data);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectiveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectiveRequest $request)
    {
       if($request->isMethod('post')) {
            $data = $request->except('_token');
            $data['type'] = 'subjective';
            $obj = new Subjective;
            $obj->insert($data);
            return redirect('teacher/questions');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Http\Response
     */
    public function show(Subjective $subjective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data['subjective'] = Subjective::find($id);
        if($request->user()->cannot('edit', $data['subjective'])){
            abort(403);
        }else
            $data['papers'] = Paper::all();
            return view('questions.subjectives.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectiveRequest  $request
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Obj = Subjective::find($id);
        if($request->user()->cannot('update', $Obj)){
            abort(403);
        }else{
            $data = $request->except('_token');
            $data['teacher_id'] = Auth::user()->id;
            $Obj->update($data);
            return redirect('teacher/questions');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subjective  $subjective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->user()->cannot('delete', Subjective::find($id))){
            abort(403);
        }else
            Paper::destroy($id);
            return redirect('teacher/questions');
    }
}
