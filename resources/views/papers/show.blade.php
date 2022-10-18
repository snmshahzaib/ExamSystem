@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Paper') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <input type="hidden" name="paper_id" value="{{$paper->id}}">
                        @if($paper->mcqs->count() !=  0)
                            <div class="my-2">
                                <p class="fw-bold">Q. Multiple Choice Questions. Choose the correct option.</p>
                                @foreach ($paper->mcqs as $key => $mcq)
                                <div class="row">
                                <div class="col-md-7">
                                    <label class="my-2">{{($key+1)}}. {{$mcq->question}}</label>
                                </div>
                                <div class="col-md-5">
                                    <form method="POST" action="{{route('mcqs.destroy', $mcq->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name = 'paper_id' value="{{$mcq->paper_id}}">
                                        <button type="submit" class="btn btn-sm btn-danger float-end">Delete</button>
                                    </form>
                                    <a href="{{route('mcqs.edit', $mcq->id)}}" class="btn btn-sm btn-info float-end">Edit Mcq</a>
                                </div>
                            </div>
                                    @foreach ($mcq->options as $option)
                                        <input type="checkbox" class="checkoption" name="mcq[{{$mcq->id}}]" value="{{$option->option}}" onclick="checkedOnClick(this);">  {{$option->option}} <br>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                        @if($paper->trueFalseQuestions->count() !=  0)
                            <div class="my-3">
                                <p class="fw-bold">Q. Chose either True or False.</p>
                                @foreach ($paper->trueFalseQuestions as $key => $tf)
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="my-2">{{($key+1)}}. {{$tf->question}}</label>
                                    </div>
                                    <div class="col-md-5">
                                        <form method="POST" action="{{route('truefalsequestions.destroy', $tf->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger float-end">Delete</button>
                                        </form>
                                        <a href="{{route('truefalsequestions.edit', $tf->id)}}" class="btn btn-sm btn-info float-end">Edit TrueFalse</a>
                                    </div>
                                    </div>
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
                                <div class="row">
                                    <div class="col-md-7">
                                        <p class="my-2">{{($key+1)}}. {{$subjective->question}}(  {{$subjective->grade}} marks)</p>
                                    </div>
                                    <div class="col-md-5">
                                        <form method="POST" action="{{route('subjectives.destroy', $subjective->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger float-end">Delete</button>
                                        </form>
                                        <a href="{{route('subjectives.edit', $subjective->id)}}" class="btn btn-sm btn-info float-end">Edit Subjective</a>
                                    </div>
                                </div>
                                    <textarea name="subjective[{{$subjective->id}}]" rows="2" cols="50" maxlength="200"></textarea>                                    
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
