@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update a subject') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{route('registersubjects.update', $reg_Subject->id)}}">
                            @csrf
                            @method('PUT')
                            <label class="form-label">Subject</label>
                            <select name="subject" class="form-control">
                                @foreach ($subjects as $subject)
                                    <option value='{{$subject->name}}'>{{$subject->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-info mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
