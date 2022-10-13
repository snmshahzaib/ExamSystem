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
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @php $exams =0 @endphp
                                @foreach ($studentdetails as $regSubject)
                                    @if($regSubject->subject->papers->count() !== 0 )
                                        @php $exams++ @endphp
                                    @endif
                                @endforeach
                                <h1> {{$exams}} </h1>   
                                    Incoming Exams
                            </div>
                            <div class="col-md-4 text-center">
                                <h1>{{$studentdetails->count()}}</h1>
                                Registered Subjects
                            </div>

                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
