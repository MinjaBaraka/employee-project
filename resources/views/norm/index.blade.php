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
          <h3>Dashboard</h3>
       </div>
       <section class="section">
          <div class="row mb-2">
            <div class="col-xl-4 col-md-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between p-md-1">
          <div class="d-flex flex-row">
            <div class="align-self-center">
              <i class="fa fa-plane text-success fa-3x me-4"></i>
            </div>
            <div>
              <h4>Leave</h4>
            <h2 class="h1 mb-0">{{ $leave }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>          <div class="col-xl-4 col-md-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between p-md-1">
          <div class="d-flex flex-row">
            <div class="align-self-center">
              <i class="fa fa-check text-info fa-3x me-4"></i>
            </div>
            <div>
              <h4>Approved</h4>
            <h2 class="h1 mb-0">{{ $approved }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>          <div class="col-xl-4 col-md-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between p-md-1">
          <div class="d-flex flex-row">
            <div class="align-self-center">
              <i class="fa fa-info text-warning fa-3x me-4"></i>
            </div>
            <div>
              <h4>Pending</h4>
            <h2 class="h1 mb-0">{{ $pending }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>          <div class="col-xl-4 col-md-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between p-md-1">
          <div class="d-flex flex-row">
            <div class="align-self-center">
              <i class="fa fa-trash text-danger fa-3x me-4"></i>
            </div>
            <div>
              <h4>Canceled</h4>
            <h2 class="h1 mb-0">{{ $not_approved }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
          </div>
       </section>
    </div>
 </div>
@endsection