@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Mcq') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form method="POST" action="{{ route('mcqs.store') }}">
                            @csrf
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
                                <input type="text" name="grade" placeholder="10"  class="form-control" >
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Question Text</label>
                                <input type="text" name="question" placeholder="What are ......?"  class="form-control" >
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Option 1</label>
                                <input type="text" name="option[0]" placeholder="......?"  class="form-control" >
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Option 2</label>
                                <input type="text" name="option[1]" placeholder="......?"  class="form-control" >
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Option 3</label>
                                <input type="text" name="option[2]" placeholder="......?"  class="form-control" >
                            </div>
                            <div class="mt-2">
                                <label class="form-label">Option 4</label>
                                <input type="text" name="option[3]" placeholder="......?"  class="form-control" >
                            </div>

                            <div class="mt-2">
                                <label class="form-label">Correct Option</label>
                                <input type="text" name="correct_option" placeholder="......?"  class="form-control" >
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
