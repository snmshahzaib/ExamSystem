<?php

namespace App\Http\Controllers;

use App\Models\Mcq;
use App\Models\Paper;
use App\Models\Option;
use App\Http\Requests\StoreMcqRequest;
use App\Http\Requests\UpdateMcqRequest;
use Illuminate\Http\Request;

class McqController extends Controller
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
        if(request()->user()->cannot('view', Mcq::class)){
            abort(403);
        }else
            $id = request()->id;
            $data['mcq'] = Mcq::find($id);
            $data['options'] = Option::where('mcq_id', $id)->get();
            return view('questions.mcqs.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->user()->cannot('create', Mcq::class)){
            abort(403);
        }else
            $data['papers'] = Paper::all();
            return view('questions.mcqs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMcqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMcqRequest $request)
    {
        $data = $request->except('_token');
        $data['type'] = 'mcq';
        $obj = new Mcq;
        $mcq = $obj->create($data);
        return redirect()->route('options.create', ['id' => $mcq->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function show(Mcq $mcq)
    {
        //  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $data['mcq'] = Mcq::find($id);
        if($request->user()->cannot('edit', $data['mcq'])){
            abort(403);
        }else
            $data['papers'] = Paper::all();
            return view('questions.mcqs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMcqRequest  $request
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMcqRequest $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $data['type'] = 'mcq';
        $Obj = Mcq::findOrFail($id);
        $Obj->update($data);
        $mcq['id'] = $id;
        return redirect()->route('mcqs.index', $mcq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if($request->user()->cannot('delete', Mcq::class)){
            abort(403);
        }else
            Mcq::destroy($id);
            Option::where('mcq_id', $id)->delete();
            return redirect()->route('papers.show', request()->paper_id);
    }
}
