@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Exams List') }}</div>
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
                                    <th scope="col" class="col-md-1">Subject</th>
                                    <th scope="col" class="col-md-1">Type</th>
                                    <th scope="col" class="col-md-1">Date</th>
                                    <th scope="col" class="col-md-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($regSubjects as $regSubject)
                                    <tr>
                                        <th scope="col" class="col-md-1">{{$regSubject->subject->name}}</th>
                                        @foreach ($regSubject->subject->papers as $paper)
                                            <th scope="col" class="col-md-1">{{$paper->type}}</th>
                                            <th scope="col" class="col-md-1">{{$paper->date}}</th>
                                            <th class="col-md-2 text-center">
                                                <div class="row">
                                                    <form method="GET" action="{{route('attemptexams.create')}}">
                                                        <input type="hidden" name="paper_id" value="{{$paper->id}}">
                                                        @if($paper->status != "attempted")
                                                            <button type="submit" class="btn btn-sm btn-danger col-md-2">Attempt</button>
                                                        @else
                                                        <button type="submit" class="btn btn-sm btn-success col-md-3" disabled>Attempted</button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </th>
                                        @endforeach
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
