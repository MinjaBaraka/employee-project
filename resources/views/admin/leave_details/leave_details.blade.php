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
                                     <a href="leave_details.html"><h6 class='text-bold'>Jane Doe</h6>
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
          <h3>Leave Details</h3>
       </div>
       <section id="basic-vertical-layouts">
<div class="row match-height">
<div class="col-md-12 col-12">
<div class="card">
    <div class="card-content">
    <div class="card-body">
        <form class="form form-vertical">
        <div class="form-body">
            <div class="row">
            <div class="col-12">
                <table class='table' id="table1">
                       
                        <tbody>
                            <tr>
                                <td><b>Full Name:</b>    John Doe</td>
                                <td><b>Age:</b>    23</td>
                                <td><b>Gender:</b>    Male</td>
                            </tr>
                            <tr> 
                                <td><b>Leave Type:</b>    Sick Leave</td>
                                <td><b>Leave Date:</b>    05-23- to 05-25-2021</td>
                                <td><b>Posting Date:</b>    05-23-2021</td>
                            </tr>
                            <tr>
                                <td><b>Leave Status:</b>    pending</td>
                                <td></td><td></td>
                            </tr>
                            <tr>
                                <td><b>Admin Remark:</b>    waiting for approval</td>
                                <td></td><td></td>
                            </tr>
                        </tbody>
                    </table>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Approve</button>
                <button type="submit" class="btn btn-primary me-1 mb-1">Not Approve</button>
            </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
</div>
</section>
<!-- // Basic Vertical form layout section end -->
    </div>
 </div>
@endsection