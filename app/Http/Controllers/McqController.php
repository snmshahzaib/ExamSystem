<?php

namespace App\Http\Controllers;

use App\Models\Mcq;
use App\Models\Paper;
use App\Models\Option;
use App\Http\Requests\StoreMcqRequest;
use App\Http\Requests\UpdateMcqRequest;
use App\Classes\UnsetToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class McqController extends Controller
{
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
    public function store(StoreMcqRequest $request, UnsetToken $unset)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            $unset->unset($data);
            $data['type'] = 'mcq';
            $options['options'] = $data['option'];
            unset($data['option']);
            $obj = new Mcq;
            $obj1 = new Option;
            $mcq = $obj->create($data);
            foreach ($options['options'] as $key => $value) {
                $opt['mcq_id'] = $mcq->id;
                $opt['option'] = $value;
                $obj1->create($opt);
            }
            return redirect('teacher/questions');
        }
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
        if($request->user()->cannot('edit', Mcq::class)){
            abort(403);
        }else
            $data['papers'] = Paper::all();
            $data['mcq'] = Mcq::find($id);
            return view('questions.mcqs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMcqRequest  $request
     * @param  \App\Models\Mcq  $mcq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMcqRequest $request, UnsetToken $unset, $id)
    {
        if($request->isMethod('put')){
            $data = $request->all();
            $unset->unset($data);
            $data['type'] = 'mcq';
            $options['options'] = $data['option'];
            unset($data['option']);
            $Obj = Mcq::findOrFail($id);
            $obj1 = Option::where('mcq_id', $id);
            $Obj->update($data);
            foreach ($obj1->get() as $key => $value) {
                $obj1 = Option::where('id', $value->id);
                $opt['mcq_id'] = $id;
                $opt['option'] = $options['options'][$key];
                $obj1->update($opt);
            }
            return redirect('teacher/questions');
        }
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
            return redirect('teacher/questions');
    }
}
