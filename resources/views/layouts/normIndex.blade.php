<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Employee Leave Management System</title>
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
      <script defer src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
      <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
   </head>
   <body>
      <div id="app">
         <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
               <div class="sidebar-header" style="height: 50px;margin-top: -30px">
                      <i class="fa fa-users text-success me-4"></i>
                        <span>ELMS</span>
                </div>
               <div class="sidebar-menu">
                  @include('layouts.normIndex.navbar')
               </div>
               <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
         </div>
         @yield('dashboard')
      </div>
      <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
      <script src="{{ asset('assets/js/app.js') }}"></script>
      <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
      <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
      <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
   </body>
</html>