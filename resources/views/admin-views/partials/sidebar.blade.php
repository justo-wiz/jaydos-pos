@php
$id = Auth::user()->id;
$profiledata = App\Models\User::find($id);

@endphp

<div id="sidebar" class="sidebar" data-disable-slide-animation="true">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="{{ (!empty($profiledata->photo)) ? url('backend/admin/uploads/user/'.$profiledata->photo)
                            : url('backend/admin/uploads/user/user-12.jpg') }}" alt="" />
                    </div>
                    <div class="info">
                        <b></b>{{ $profiledata->username }}
                        <small>{{ $profiledata->name }}</small>
                    </div>
                </a>
            </li>

        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">

            <li class="has-sub active">
                <a href="{{ route('admin.dashboard')}}">

                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>

            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="material-icons">inbox</i>
                    <span>Email</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_inbox.html">Inbox</a></li>
                    <li><a href="email_compose.html">Compose</a></li>
                    <li><a href="email_detail.html">Detail</a></li>
                </ul>
            </li>
            <li>
                <a href="widget.html">
                    <i class="material-icons">extension</i>
                    <span>POS <span class="label label-theme">NEW</span></span>
                </a>
            </li>

            <li>
                <a href="bootstrap_4.html">
                    <div class="icon-img">
                        <img src="{{asset('backend/admin/assets/img/logo/logo-bs4.png')}}" alt="" />
                    </div>
                    <span>Bootstrap 4 <span class="label label-theme">NEW</span></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">insert_drive_file</i>
                    <span>Category </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ route('all.category') }}">All Categories</a></li>
                    <li><a href="{{ route('add.category') }}">Add Category</a></li>

                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">insert_drive_file</i>
                    <span>Brand </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ route('all.brand') }}">All Brand</a></li>
                    <li><a href="{{ route('add.brand') }}">Add Brand</a></li>

                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">insert_drive_file</i>
                    <span>Unit </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ route('all.unit') }}">All Unit</a></li>
                    <li><a href="{{ route('add.unit') }}">Add Unit</a></li>

                </ul>
            </li>


            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">help</i>
                    <span>Helper</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="helper_css.html">Predefined CSS Classes</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">list</i>
                    <span>Menu Level</span>
                </a>
                <ul class="sub-menu">
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Menu 1.1
                        </a>
                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    Menu 2.1
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:;">Menu 3.1</a></li>
                                    <li><a href="javascript:;">Menu 3.2</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:;">Menu 2.2</a></li>
                            <li><a href="javascript:;">Menu 2.3</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Menu 1.2</a></li>
                    <li><a href="javascript:;">Menu 1.3</a></li>
                </ul>
            </li>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>