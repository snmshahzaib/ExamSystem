<?php

namespace App\Http\Controllers;

use App\Models\RegisteredSubject;
use App\Http\Requests\StoreRegisteredSubjectRequest;
use App\Http\Requests\UpdateRegisteredSubjectRequest;

class RegisteredSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisteredSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisteredSubjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisteredSubject  $registeredSubject
     * @return \Illuminate\Http\Response
     */
    public function show(RegisteredSubject $registeredSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisteredSubject  $registeredSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisteredSubject $registeredSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegisteredSubjectRequest  $request
     * @param  \App\Models\RegisteredSubject  $registeredSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisteredSubjectRequest $request, RegisteredSubject $registeredSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisteredSubject  $registeredSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisteredSubject $registeredSubject)
    {
        //
    }
}
