@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('grades_trans.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('grades_trans.list_grade')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{trans('grades_trans.title_page')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGradeModal">
                    {{trans('grades_trans.add_grade')}}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('grades_trans.Name')}}</th>
                            <th>{{trans('grades_trans.Notes')}}</th>
                            <th>{{trans('grades_trans.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($Grades as $Grade)
                            <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$Grade->name}}</td>
                                <td>{{$Grade->notes}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="model"
                                            data-target="#edit{{$Grade->id}}" title="{{trans('grades_trans.Edit')}}"> <i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="model"
                                            data-target="#delete{{$Grade->id}}" title="{{trans('grades_trans.Delete')}}"> <i class="fa fa-trash"></i></button>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addGradeModal" tabindex="-1" role="dialog" aria-labelledby="addGradeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo',sans-serif" class="modal-title" id="addGradeModalLabel">{{trans('grades_trans.add_grade')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('grade.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">{{trans('grades_trans.stage_name_ar')}}:</label>
                                <input id="Name" type="text" name="Name" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">{{trans('grades_trans.stage_name_en')}}:</label>
                                <input type="text" name="Name_en" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('grades_trans.Notes')}}</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('grades_trans.Close')}}</button>
                            <button type="submit" class="btn btn-success">{{trans('grades_trans.Submit')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
