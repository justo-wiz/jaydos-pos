<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Jaydos | POS</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    @include('admin-views.partials.top_links')
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<style>
    .login-cover-image {
        background-image: url({{ asset ('backend/admin/assets/img/login-bg/login-bg-17.jpg')
    }})
    }
</style>

<body class="pace-top">
    <!-- begin #page-loader -->
    @include('admin-views.partials.page_loader')
    <!-- end #page-loader -->

    <!-- begin login-cover -->
    <div class="login-cover">
        <div class="login-cover-image" style="" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- end login-cover -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> <b>Welcome</b> Login
                    <small></small>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content">
                <form action="{{ route('login') }}" method="POST" class="margin-bottom-0">
                    @csrf
                    <div class="form-group m-b-20">
                        <label class="" for="login">Email/Phone</label>
                        <input type="text" name="login" id="login" class="form-control form-control-lg" placeholder="Email / Phone" required />
                    </div>
                    <div class="form-group m-b-20">
                        <label class="" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required />
                    </div>
                    <div class="checkbox checkbox-css m-b-20">
                        <input type="checkbox" id="remember_checkbox" />
                        <label for="remember_checkbox">
                            Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-aqua btn-block btn-lg">Sign me in</button>
                    </div>
                    <div class="m-t-20">
                        Not a member yet? Click <a href="javascript:;">here</a> to register.
                    </div>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end login -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('backend/admin//assets/js/app.min.js')}}"></script>
    <script src="{{ asset('backend/admin/assets/js/theme/material.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('backend/admin/assets/js/demo/login-v2.demo.js')}}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    @include('admin-views.partials.bottom_links')
</body>

</html>