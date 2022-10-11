@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Questions List') }}
                    <div class="">
                        <a href="{{ route('mcqs.create')}}" class="btn btn-sm btn-info col-md-3">Add Objectives</a>
                        <a href="{{ route('subjectives.create')}} " class="btn btn-sm btn-info col-md-3">Add Subjectives</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-md-1">Topic</th>
                                    <th scope="col" class="col-md-1">Que. #</th>
                                    <th scope="col" class="col-md-1">Que. Type</th>
                                    <th scope="col" class="col-md-7">Question</th>
                                    <th scope="col" class="col-md-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($subjectives as $subjective)
                                    <tr>
                                        <th scope="col" class="col-md-1">{{$subjective->paper->subject->name}}({{$subjective->paper->type}})</th>
                                        <th scope="col" class="col-md-1">{{$subjective->id}}</th>
                                        <th scope="col" class="col-md-1">{{$subjective->type}}</th>
                                        <th scope="col" class="col-md-7">{{$subjective->question}}</th>
                                        <th class="col-md-2">
                                            <div class="row">
                                                <form method="POST" action="{{route('subjectives.destroy', $subjective->id)}}" class="col-md-6">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="subjectives/{{$subjective->id}}/edit" class="btn btn-sm btn-info col-md-3">Edit</a>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @foreach ($mcqs as $mcq)
                                    <tr>
                                        <th scope="col" class="col-md-1">{{$mcq->paper->subject->name}}({{$mcq->paper->type}})</th>
                                        <th scope="col" class="col-md-1">{{$mcq->id}}</th>
                                        <th scope="col" class="col-md-1">{{$mcq->type}}</th>
                                        <th scope="col" class="col-md-7">{{$mcq->question}}</th>
                                        <th class="col-md-2">
                                            <div class="row">
                                                <form method="POST" action="{{route('mcqs.destroy', $mcq->id)}}" class="col-md-6">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="mcqs/{{$mcq->id}}/edit" class="btn btn-sm btn-info col-md-3">Edit</a>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
