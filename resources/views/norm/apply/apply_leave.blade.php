@extends('layouts.normIndex')
@section('dashboard')
<div id="main">
    <nav class="navbar navbar-header navbar-expand navbar-light">
        <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
        <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
           data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
           aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
             
              <li class="dropdown">
                 <a href="#" data-bs-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar me-1">
                       <img src="{{ asset('assets/images/admin.png') }}" alt="" srcset="">
                    </div>
                    <div class="d-none d-md-block d-lg-inline-block"> Hi Employee</div>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                    <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                    <div class="dropdown-divider"></div>
    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     
                     <i data-feather="log-out"></i> Logout</a>
    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </div>
                 </div>
              </li>
           </ul>
        </div>
     </nav>
    
<div class="main-content container-fluid">
<div class="page-title">
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Apply for Leave</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class='breadcrumb-header'>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/employee" class="text-success">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Leave Application</li>
            </ol>
        </nav>
    </div>
</div>

</div>


<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                    <form class="form" method="POST" action="/apply_leave/store">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Reference Number</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="id number" name="leave_number" value="{{ old('leave_number') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-hash"></i>
                                        </div>
                                        @error('leave_number')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="status" value="0">
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Select Leave Type</label>
                                    <div class="position-relative">
                                        <fieldset class="form-group">
                                            <select class="form-select" name="select_leave_type">
                                                <option value="">-- select Leave Type here --</option>
                                                <option value="Casual_Leave">Casual_Leave</option>
                                                <option value="Sick_Leave">Sick_Leave</option>
                                            </select>
                                            @error('select_leave_type')
                                            <strong><i class="text-danger">{{$message}}</i></strong>
                                             @enderror
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">From Date</label>
                                    <div class="position-relative">
                                        <input type="date" class="form-control" placeholder="" name ="from_date" value="{{ old('from_date') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('from_date')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">To Date</label>
                                    <div class="position-relative">
                                        <input type="date" class="form-control" placeholder="" name="to_date" value="{{ old('to_date') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('to_date')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- // Basic multiple Column Form section end -->
</div>

</div>
@endsection