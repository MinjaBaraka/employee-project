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
                   <div class="d-none d-md-block d-lg-inline-block">Hi, Employee</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                   <a class="dropdown-item" href="update.html"><i data-feather="user"></i> Account</a>
                   <a class="dropdown-item" href="update_password.html"><i data-feather="settings"></i> Settings</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="login.html"><i data-feather="log-out"></i> Logout</a>
                </div>
             </li>
          </ul>
        </div>
    </nav>

    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Leave Status</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/employee" class="text-success">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Leave Status</li>
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
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Posting Date</th>
                                <th>Remark</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($apply_leaves)>0)
                            @foreach($apply_leaves as $apply_leave)
                                <tr>
                                    <td>{{ $apply_leave -> select_leave_type }}</td>
                                    <td>{{ $apply_leave -> from_date}}</td>
                                    <td>{{ $apply_leave -> to_date }}</td>

                                    <td>{{ $apply_leave -> created_at }}</td>

                                    <td></td>

                                    <td>
                                        {{-- {{ $apply_leave->status  === '0' ? 'Pending' : ($apply_leave ->status === '1' ? 'Approved' : 'Not approved')}} --}}

                                        @if ($apply_leave->status  === '0')
                                        <span class="badge bg-primary">Pending</span>
                                        @elseif($apply_leave->status  === '1')
                                        <span class="badge bg-success">Approved</span>
                                        @else
                                        <span class="badge bg-danger">Not approved</span>
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach

                            @else
                            <i class="text-danger">No Appy Leave exists</i>
                            @endif
                            
                        </tbody>
                    </table>
                    <div style="margin-left: 85%">
                        {{ $apply_leaves->Links() }}    
                    </div> 
                </div>
            </div>

        </section>
    </div>
</div>
@endsection