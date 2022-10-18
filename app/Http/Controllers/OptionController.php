<?php

namespace App\Http\Controllers;

use App\Models\Mcq;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Paper;

class OptionController extends Controller
{
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
    public function create()
    {
        $id = request()->id;
        $data['mcq'] = Mcq::find($id);
        $data['options'] = Option::where('mcq_id', $id)->get();
        return view('questions.mcqs.options.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Option $option)
    {
        $opt = request()->except(['question', '_token']);
        $option->create($opt);
        $mcq['id'] = $opt['mcq_id'];
        return redirect()->route('mcqs.index', $mcq);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option['option'] = Option::find($id);
        return view('questions.mcqs.options.edit', $option);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $option = Option::find($id);
        $optionR = request()->except(['_token', '_method']);
        $option->update($optionR);
        $mcq['id'] = $optionR['mcq_id'];
        return redirect()->route('mcqs.index', $mcq);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Option::destroy($id);
        $mcq['id'] = request()->id;
        return redirect()->route('mcqs.index', $mcq);
    }
}
