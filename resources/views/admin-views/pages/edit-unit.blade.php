@extends('layouts.admin.dashboard')

@section('content')


<!-- begin #content -->

<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Unit</a></li>
    <li class="breadcrumb-item active">Edit Unit</li>

</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Unit</h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
    <!-- begin col-10 -->
    <div class="col-xl-10">
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Edit Unit</h4>
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

                <form action="{{ route('update.unit') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $unit->id }}">
                    <fieldset>

                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-7">
                                <input type="text" name="name" value="{{$unit->name}}" class="form-control @error('name') is-invalid @enderror" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-form-label">Slug</label>
                            <div class="col-md-7">
                                <input type="text" name="slug" value="{{$unit->slug}}" class="form-control @error('slug') is-invalid @enderror" />
                                @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-sm btn-primary m-r-5">Update</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- end panel-body -->
        </div>
    </div>
    <!-- end col-10 -->
</div>
<!-- end row -->

<!-- end #content -->
@endsection