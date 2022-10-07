@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row h1 ms-2 mt-2">Subject</div>
                <div class="card-header">Edit</div>
                <div class="card-body">
                    <h4>Title</h4>
                    <form method="POST" action="{{ route('subjects.update', $subject->id) }}">
                        @csrf
                        @method('PUT')
                        <input class="form-control" type="text" name="name" value="{{$subject->name}}">
                        <input class="form-control" type="hidden" name="id" value="{{$subject->id}}">
                        <button class="btn btn-danger mt-2" type="submit" >Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
