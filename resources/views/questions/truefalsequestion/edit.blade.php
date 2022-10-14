
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update True/False Question') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{ route('truefalsequestions.update', $tf->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mt-2">
                                <label class="form-label">Exam</label>
                                <select name="paper_id" class="form-control">
                                    @foreach ($papers as $papers)
                                        <option value='{{$papers->id}}'>{{$papers->subject->name}}({{$papers->type}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Grade</label>
                                <input type="text" name="grade" value="{{$tf->grade}}"  class="form-control" >
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Question Text</label>
                                <input type="text" name="question" value="{{$tf->question}}"  class="form-control" >
                            </div>

                            <div class="mt-2">
                                <label class="form-label">Correct Option</label>
                                <select name="correct_option" class="form-control">
                                    <option value='true'>True</option>
                                    <option value='false'>False</option>
                                </select>
                            </div>  
                            <button type="submit" class="btn btn-info mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
