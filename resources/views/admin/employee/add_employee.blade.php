@extends('layouts.adminIndex')
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
             <li class="dropdown nav-icon">
                     <a href="#" data-bs-toggle="dropdown"
                         class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                         <div class="d-lg-inline-block">
                             <i data-feather="bell"></i><span class="badge bg-info">2</span>
                         </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                         <h6 class='py-2 px-4'>Notifications</h6>
                         <ul class="list-group rounded-none">
                             <li class="list-group-item border-0 align-items-start">
                             <div class="row mb-2">
                             <div class="col-md-12 notif">
                                     <a href="leave_details"><h6 class='text-bold'>John Doe</h6>
                                     <p class='text-xs'>
                                         applied for leave at 05-21-2021
                                     </p></a>
                                 </div>
                             <div class="col-md-12 notif">
                                     <a href="leave_details"><h6 class='text-bold'>Jane Doe</h6>
                                     <p class='text-xs'>
                                         applied for leave at 05-21-2021
                                     </p></a>
                                 </div>
                               </div>
                             </li>
                         </ul>
                     </div>
                 </li>
              <li class="dropdown">
                 <a href="#" data-bs-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar me-1">
                       <img src="{{ asset('assets/images/admin.png') }}" alt="" srcset="">
                    </div>
                    <div class="d-none d-md-block d-lg-inline-block"> Hi {{ Auth::user()->name }}</div>
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
        <h3>Add Employee</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class='breadcrumb-header'>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home" class="text-success">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
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
                    <form class="form" method="POST" action="/add_employee/store" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">ID Number</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="id number" name="employee_number" value="{{ old('id_number') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-hash"></i>
                                        </div>
                                        @error('employee_number')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Gender</label>
                                    <div class="position-relative">
                                        <fieldset class="form-group">
                                            <select class="form-select" name="select_gender" value="{{ old('select_gender') }}">
                                                <option value="">Select Gender here</option>
                                                <option value="male">male</option>
                                                <option value="female">female</option>
                                            </select>
                                            @error('select_gender')
                                            <strong><i class="text-danger">{{$message}}</i></strong>
                                             @enderror
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">First Name</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="first name" name="first_name" value="{{ old('first_name') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('first_name')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Middle Name</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="middle name" name="middle_name" value="{{ old('middle_name') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('middle_name')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div><div class="col-md-4 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Last Name</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="last name" name="last_name" value="{{ old('last_name') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('last_name')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Age</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="age" name="age" value="{{ old('age') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('age')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Email</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="email" name="email" value="{{ old('email') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        @error('email')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Contact</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="contact" name="contact" value="{{ old('contact') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        @error('contact')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Profile</label>
                                    <div class="position-relative">
                                        <input type="file" class="form-control" placeholder="" name="image" value="{{ old('image') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('image')
                                        <strong><i class="text-danger">{{$message}}</i></strong>
                                         @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Deapartment</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="select_department">
                                                
                                                {{-- <option>Select Department</option>
                                                <option>IT</option>
                                                <option>ENGINEERING</option>
                                                <option>HR</option>
                                                <option>FINANCE</option> --}}
                                                
                                                <option value="">Select Department</option>
                                                   @foreach($employees as $department)
                                                       
                                                       <option value="{{ $department -> id }}">{{ $department -> department_name }}</option>
                                                        
                                                   @endforeach
                                                
                                            </select>
                                            @error('select_department')
                                            <strong><i class="text-danger">{{$message}}</i></strong>
                                             @enderror
                                        </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Designation</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" name="select_designation">
                                                <option value="">Select Designation</option>
                                                {{-- <option>IT</option>
                                                <option>MANAGER</option>
                                                <option>SUPERVISOR</option>
                                                <option>ENGINEER</option> --}}
                                                
                                                @foreach($designation as $designations)
                                                       
                                                <option value="{{ $designations -> id }}">{{ $designations -> 	input_description }}</option>
                                                 
                                            @endforeach

                                            </select>
                                            @error('select_designation')
                                            <strong><i class="text-danger">{{$message}}</i></strong>
                                             @enderror
                                        </fieldset>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Username</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="username" name="username" value="{{ old('username') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        @error('username')
                                         <strong><i class="text-danger">{{$message}}</i></strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="passsword" name="passsword" value="{{ old('passsword') }}">
                                        <div class="form-control-icon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        @error('passsword')
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