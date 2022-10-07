@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subjects') }} 
                    <p class=""><a href="{{ route('subjects.create') }}" class="btn btn-success">Add new Subject</a></p>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            <table class="table table-bordered table-striped datatable dt-select dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th style="text-align:center;" class="select-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label=""></th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 219px;">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="&amp;nbsp;: activate to sort column ascending" style="width: 574px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                    <tr data-entry-id="1" role="row" class="odd">
                                        <td class=" select-checkbox"></td>
                                        <td>{{$subject->name}}</td>
                                        <td>
                                            <div class="row">
                                            <form method="POST" action="{{ route('subjects.destroy', $subject->id) }}" class="col-md-3">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-danger">DELETE</button>
                                            </form>
                                            <a href="subjects/{{$subject->id}}/edit" class="btn btn-sm col-md-2 btn-info">Edit</a>
                                            </div>
                                        </td>
                                    </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
