@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Option') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{ route('options.update', $option->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mt-2">
                                <label class="form-label">Option</label>
                                <input type="text" name="option" value="{{$option->option}}" class="form-control" >
                                <input type="hidden" name="mcq_id" value="{{$option->mcq_id}}" class="form-control" >
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info float-end my-2">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
