@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Answer the followin questions.') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{ route('answers.store') }}">
                            @csrf
                            <input type="hidden" name="paper_id" value="{{$paper->id}}">
                            @if($paper->mcqs->count() !=  0)
                                <div class="my-2">
                                    <p class="fw-bold">Q. Multiple Choice Questions. Choose the correct option.</p>
                                    @foreach ($paper->mcqs as $key => $mcq)
                                        <p class="my-2">{{($key+1)}}. {{$mcq->question}}</p>
                                        @foreach ($mcq->options as $option)
                                            {{-- <input type="checkbox" class="checkoption" name="mcq[][{{$mcq->id}}]" value="{{$option->option}}" onclick="checkedOnClick(this);">  {{$option->option}} <br> --}}
                                            <input type="checkbox" class="checkoption" name="mcq[{{$mcq->id}}]" value="{{$option->option}}" onclick="checkedOnClick(this);">  {{$option->option}} <br>
                                        @endforeach
                                    @endforeach
                                </div>
                            @endif
                            @if($paper->trueFalseQuestions->count() !=  0)
                                <div class="my-3">
                                    <p class="fw-bold">Q. Chose either True or False.</p>
                                    @foreach ($paper->trueFalseQuestions as $key => $tf)
                                        <p class="my-2">{{($key+1)}}. {{$tf->question}}</p>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="truefalse[{{$tf->id}}]" value="true" id="tf">
                                            <label class="form-check-label" for="tf">
                                              True
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="truefalse[{{$tf->id}}]" value="false" id="tf1">
                                        <label class="form-check-label" for="tf1">
                                            False
                                        </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif     
                            @if($paper->subjectives->count() !=  0)    
                                <div class="my-3">
                                    <p class="fw-bold">Q. Subjective questions</p>
                                    @foreach ($paper->subjectives as $key => $subjective)
                                        <p class="my-2">{{($key+1)}}. {{$subjective->question}}(  {{$subjective->grade}} marks)</p>
                                        <textarea name="subjective[{{$subjective->id}}]" rows="2" cols="50" maxlength="200">
                                            
                                        </textarea>                                    
                                    @endforeach
                                </div>
                            @endif
                            <button type="submit" class="btn btn-info mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
