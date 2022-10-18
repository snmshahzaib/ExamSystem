@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mcq') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="mt-2">
                            <label class="form-label">Add option to Question: </label>
                            <label class="form-control" >{{$mcq->question}}</label>
                        </div>
                        @if($options->count() != 0)
                            @foreach ($options as $key => $option)
                                <div class="mt-2">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="checkbox" class="form-check-input" name="" value="">
                                            <label class="form-label">  {{$option->option}}</label>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="inline">
                                                <form method="POST" action="{{route('options.destroy', $option->id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name = 'id' value="{{$option->mcq_id}}">
                                                    <button type="submit" class="btn btn-sm btn-danger float-end">Delete</button>
                                                </form>
                                                <a href="options/{{$option->id}}/edit" class="btn btn-sm btn-info col-md-3 float-end">Edit</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif    
                        <div>
                            <a href="{{route('options.create', ['id' => $mcq->id])}}" class="btn btn-info my-2">Add more options</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
