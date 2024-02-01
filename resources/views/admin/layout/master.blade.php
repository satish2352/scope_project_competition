<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{ env('APP_NAME') }}
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('website_files/images/home/DM.ico') }}">
    <!-- global css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ti-icons/css/themify-icons.css') }}">
    <!-- poppins font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- page css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stepwizard.css') }}">
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('website_files/images/home/DMS.png') }}" />
    <!-- toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <!-- {{-- CKEditor CDN --}} -->
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!-- Summernote Editor -->


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>  --}}

    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote-bs4.css') }}">
    <script src="{{ asset('assets/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>

    <!-- Summernote Editor End -->
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <style>
        .error {
            /* color: #d8000c; */
            color: red !important;
            font-size: 14px;
            font-weight: 400 !important;
        }

        .close {
            margin-top: -5px;

        }
    </style>

</head>
<?php //$profile = getProfileImage();
?>


<body class="sidebar-icon-only">


    <div class="container-scroller">
        <!-- top navigation -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img
                    src="{{ asset('website/assets/images/logo.jpeg') }}" style="padding: 10px" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img
                    src="{{ asset('website/assets/images/logo.jpg') }}" style="padding: 10px" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch pr-0">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>
                <ul class="navbar-nav">
                    <li class="nav-item d-md-flex logo-title">
                        {{ env('APP_NAME') }}
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown mr-0">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            {{-- <img class="img-size" src="{{ asset('website/assets/images/logo.jpg') }}" /> --}}
                            <i class="fas fa-user menu-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            {{-- 
                            <a 
                           
                            class="dropdown-item edit-user-btn"
                                href="">
                                <i class="fas fa-user text-primary"></i>
                                Profile
                            </a>
                          --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('log-out-admin') }}">
                                <i class="fas fa-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>


        <form method="GET" action="{{ url('/edit-user-profile') }}" id="edituserform">
            @csrf
            <input type="hidden" name="edit_user_id" id="edit_user_id" value="">
        </form>

        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.sidebar')
            @yield('content')
            @extends('admin.layout.footer')
