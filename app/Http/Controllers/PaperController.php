<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Subject;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaperController extends Controller
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
    public function index(Paper $papers, Request $request)
    {
        if($request->user()->cannot('view', $papers)){
            abort(403);
        }else{
            return view('papers.index')->with('papers', $papers->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paper $papers, Request $request)
    {
        if($request->user()->cannot('create', $papers)){
            abort(403);
        }else{
            return view('papers.create')->with('subjects', Subject::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaperRequest $request)
    {
        $data = $request->except('_token');
        $data['teacher_id'] = Auth::user()->id;
        $obj = new Paper;
        $obj->insert($data);
        return redirect('teacher/papers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paper['paper'] = Paper::find($id);
        if(request()->user()->cannot('show', $paper['paper'])){
            abort(403);
        }else{
            return view('papers.show', $paper);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['paper'] = Paper::find($id);
        if(request()->user()->cannot('edit', $data['paper'])){
            abort(403);
        }else{
            $data['subjects'] = Subject::all();
            return view('papers.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaperRequest  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaperRequest $request, Paper $paper)
    {
        $data = $request->except('_token');
        $data['teacher_id'] = Auth::user()->id;
        $Obj = $paper->find($data['id']);
        if($request->user()->cannot('update', $Obj)){
            abort(403);
        }else{
            $Obj->update($data);
            return redirect('teacher/papers');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $paper = Paper::find($id);
        if($request->user()->cannot('delete', $paper)){
            abort(403);
        }else
            Paper::destroy($id);
            return redirect('teacher/papers');
    }
}
