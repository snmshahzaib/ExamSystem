@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registered Subjects') }}
                    <a class="btn btn-info float-end" href="{{route('registersubjects.create')}}">Register Subjects</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="row">
                            @if($regSubjects->count() == 0)
                                <div class="col-md-12 text-center">
                                    <h1>0</h1>
                                </div>
                            @else
                            @foreach ($regSubjects as $regSubject)
                                <div class="col-md-4 text-center">
                                    <h2>{{$regSubject->subject->name}}</h2>
                                    <div class="row">
                                        <form method="POST" action="{{ route('registersubjects.destroy', $regSubject->id) }}" class="col-md-6">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Unregister</button>
                                        </form>
                                        <a href="{{route('registersubjects.edit', $regSubject->id)}}" class= "btn btn-sm btn-info col-md-3">Edit</a>
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
