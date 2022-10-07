@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Paper') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{route('papers.store')}}">
                            @csrf
                            <label class="form-label">Subject</label>
                            <select name="subject_id" class="form-control">
                                @foreach ($subjects as $subject)
                                    <option value='{{$subject->id}}'>{{$subject->name}}</option>
                                @endforeach
                            </select>
                            <div class="mt-2">
                                <label class="form-label">Paper Type</label>
                                <input type="text" name="type" placeholder="type* mid * final"  class="form-control">
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Date</label>
                                <input type="text" name="date" placeholder="dd/mm/yyyy"  class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-info mt-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
