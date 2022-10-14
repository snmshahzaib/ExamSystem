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
                                    <th scope="col" class="col-md-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regSubjects as $regSubject)
                                    @foreach ($regSubject->subject->papers as $paper)
                                    <tr>
                                        <th scope="col" class="col-md-1">{{$paper->subject->name}}</th>
                                        <th scope="col" class="col-md-1">{{$paper->type}}</th>
                                        <th scope="col" class="col-md-1">{{$paper->date}}</th>
                                        <th class="col-md-2 text-center">
                                            <div class="row">
                                                <form method="GET" action="{{route('answers.create')}}">
                                                    <input type="hidden" name="paper_id" value="{{$paper->id}}">
                                                    @php $status = 'unattempted' @endphp
                                                    @foreach ($answers as $key => $answer)
                                                        @if ($key == 0)
                                                            @if ($answer->paper_id == $paper->id)
                                                                <button type="submit" class="btn btn-sm btn-success col-md-2" disabled>Attempted</button>
                                                                @php $status = 'attempted' @endphp
                                                            @else
                                                                @php $status = 'unattempted' @endphp
                                                            @endif
                                                        @endif    
                                                    @endforeach
                                                    @if($status != 'attempted')
                                                        <button type="submit" class="btn btn-sm btn-danger col-md-3">Attempt</button>
                                                    @endif 
                                                </form>
                                            </div>
                                        </th>
                                    </tr>
                                    @endforeach
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
