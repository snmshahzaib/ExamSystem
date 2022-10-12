@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register a subject') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{route('registersubjects.store')}}">
                            @csrf
                            <label class="form-label">Subject</label>
                            <select name="subject_id" class="form-control">
                                @foreach ($subjects as $subject)
                                    <option value='{{$subject->id}}'>{{$subject->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-info mt-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
