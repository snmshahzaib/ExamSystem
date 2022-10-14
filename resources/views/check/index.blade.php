@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr class="bg-danger">
                                    <th scope="col" class="col-md-3">Student roll no.</th>
                                    <th scope="col" class="col-md-3">Paper</th>
                                    <th scope="col" class="col-md-3">Submitted Date</th>
                                    <th scope="col" class="col-md-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{dd($lists)}} --}}
                                @foreach ($lists as $list)
                                <tr>
                                    <th scope="col" class="col-md-3">{{$list->student_id}}</th>
                                    <th scope="col" class="col-md-3">{{$list->subject->name}}({{$list->subject->paper->type}})</th>
                                    <th scope="col" class="col-md-3">Submitted Date</th>
                                    <th scope="col" class="col-md-3">
                                        <a href="show/{{$list->student_id}}" class="btn btn-warning">Mark Paper</a>
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
@endsection
