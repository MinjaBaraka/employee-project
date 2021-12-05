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
                    <h3>Manage User</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home" class="text-success">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                    <table class='table' id="table1">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Contact</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($adduser)>0)
                            @foreach($adduser as $adduses)
                                <tr>
                                    <td>{{ $adduses -> first_name. '' . $adduses -> last_name }}</td>
                                    <td>{{ $adduses -> contact}}</td>
                                    <td>{{ $adduses -> user_catergory }}</td>
                                    <td>
                                        
                                        {{-- {{ $adduses -> status }} --}}

                                        @if ($adduses -> status == '1')
                                        
                                        <a href="{{ url('/status_update', $adduses -> id) }}"><span class="badge bg-success">Active</span></a>
                                        @else
                                        <a href="{{ url('/status_update', $adduses -> id) }}"><span class="badge bg-danger">Deactivated</span></a>
                                        @endif
                                    
                                    </td>
                                    <td><a href="/manage_user/{{ $adduses -> id }}/edit_user"><button class="btn btn-outline-success">Edit</button></a></td>
                                    <td>
                                        <form action="/manage_user/{{ $adduses -> id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button class="btn btn-outline-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @else
                            <i class="text-danger">No user exists</i>
                            @endif
                            
                        </tbody>
                    </table>
                    <div style="margin-left: 85%">
                        {{ $adduser->Links() }}    
                    </div> 
                </div>
            </div>

        </section>
    </div>
</div>
@endsection