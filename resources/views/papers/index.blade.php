@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Incoming Exams') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                            @if($papers->count() == 0)
                                <div class="col-md-12 text-center">
                                    <h1>0</h1>
                                </div>
                            @else
                            @foreach ($papers as $paper)
                                <div class="col-md-4 text-center">
                                    <h2>{{$paper->subject->name}}</h2>
                                    <h5>{{$paper->type}}</h5>
                                    <h3>{{$paper->date}}</h3>
                                    <div class="row">
                                        <form method="POST" action="{{ route('papers.destroy', $paper->id) }}" class="col-md-3 ms-1">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                        </form>
                                        <a href="papers/{{$paper->id}}/edit" class="btn btn-sm btn-info col-md-3 ms-3">Edit</a>
                                        <a href="{{ route('papers.show', $paper->id) }}" class="btn btn-sm btn-info col-md-3 text-center ms-1">Show</a>

                                    </div>
                    
                                </div>
                            @endforeach    
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
