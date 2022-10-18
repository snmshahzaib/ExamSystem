@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Option') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{ route('options.store', ['mcq_id' => $mcq->id]) }}">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label">Add option to Question: </label>
                                <label class="form-control" >{{$mcq->question}}</label>
                            </div>
                                <div class="mt-2">
                                    <label class="form-label">Option</label>
                                    <input type="text" name="option" placeholder="what .....?" class="form-control" >
                                </div>
                            <div>
                                <button type="submit" class="btn btn-info float-end my-2">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
