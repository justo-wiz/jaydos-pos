@extends('layouts.admin.dashboard')

@section('content')


<!-- begin #content -->

<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Brand</a></li>
    <li class="breadcrumb-item active">All Brands</li>

</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><a href="{{ route('add.brand') }}" class="btn btn-sm btn-info">Add Brand</a></h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
    <!-- begin col-10 -->
    <div class="col-xl-12">
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Brands</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <table id="data-table-combine" class="table table-striped table-bordered table-td-valign-middle">
                    <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th width="1%" data-orderable="false">Name</th>
                            <th class="text-nowrap">Slug</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $key => $brand)
                        <tr class="gradeU">
                            <td width="1%" class="f-s-600 text-inverse">{{$key+1}}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>
                                <a href="{{ route('edit.brand', $brand->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('delete.brand', $brand->id) }}" id="delete" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end panel-body -->
        </div>
    </div>
    <!-- end col-10 -->
</div>
<!-- end row -->

<!-- end #content -->
@endsection