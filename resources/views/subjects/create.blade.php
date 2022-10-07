@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row h1 ms-2 mt-2">Subject</div>
                <div class="card-header">Create</div>
                <div class="card-body">
                    <h4>Title</h4>
                    <form method="POST" action="{{ route('subjects.store') }}">
                        @csrf
                        <input class="form-control" type="text" name="name">
                        <button class="btn btn-danger mt-2" type="submit" >Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
