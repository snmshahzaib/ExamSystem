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
                    @can('isTeacher')
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-md-4 text-center">
                                    <h1>{{$papers}}</h1>
                                    Papers
                                </div>
                                <div class="col-md-4 text-center">
                                    <h1>{{$subjects}}</h1>
                                    Subjects
                                </div>

                            </div>
                        </div>
                    @else
                          You have Student Access
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
