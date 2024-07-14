@extends('layouts.admin.dashboard')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- begin profile -->
<div class="profile">
    <div class="profile-header">
        <!-- BEGIN profile-header-cover -->
        <div class="profile-header-cover"></div>
        <!-- END profile-header-cover -->
        <!-- BEGIN profile-header-content -->
        <div class="profile-header-content">
            <!-- BEGIN profile-header-img -->
            <div class="profile-header-img">
                <img class="wd-100" src="{{ (!empty($profiledata->photo)) ? url('backend/admin/uploads/user/'.$profiledata->photo)
                            : url('backend/admin/uploads/user/user-12.jpg') }}" alt="">
            </div>
            <!-- END profile-header-img -->
            <!-- BEGIN profile-header-info -->
            <div class="profile-header-info">
                <h4 class="mt-0 mb-1">{{ $profiledata->username }}</h4>
                <p class="mb-2">{{ $profiledata->name}}</p>
                <a href="#" class="btn btn-xs btn-yellow">Edit Profile</a>
            </div>
            <!-- END profile-header-info -->
        </div>
        <!-- END profile-header-content -->
    </div>
</div>
<!-- end profile -->


&nbsp;&nbsp;&nbsp;

<!-- begin col-6 -->
<div class="col-xl-8">

    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-stuff-11">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title">Update Profile</h4>
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
            <form action="{{ route('admin.updateprofile') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <fieldset>

                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Username</label>
                        <div class="col-md-7">
                            <input type="text" name="username" class="form-control" value="{{ $profiledata->username }}" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-7">
                            <input type="text" name="name" class="form-control" value="{{ $profiledata->name }}" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Email address</label>
                        <div class="col-md-7">
                            <input type="email" name="email" class="form-control" value="{{ $profiledata->email }}" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Phone</label>
                        <div class="col-md-7">
                            <input type="phone" name="phone" class="form-control" value="{{ $profiledata->phone }}" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Address</label>
                        <div class="col-md-7">
                            <input type="text" name="address" class="form-control" value="{{ $profiledata->address }}" />
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Photo</label>
                        <div class="col-md-7">
                            <input type="file" name="photo" id="image" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label"></label>
                        <div class="col-md-7">
                            <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profiledata->photo)) ? url('backend/admin/uploads/user/'.$profiledata->photo)
                        : url('backend/admin/uploads/user/user-12.jpg') }}" alt="">
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
    <!-- end panel -->
</div>
<!-- end col-6 -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection