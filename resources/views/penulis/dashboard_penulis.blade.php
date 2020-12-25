@extends('partial.dashboard_penulis')

@section('menu')


 <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item">
        <a href="{{ url('/penulis/dashboard') }}" class="active"><i class="fas fa-desktop"></i>Dashboard</a>
      </li>

      <!-- Nav Item - Home -->
    <li class="nav-item">
        <a href="{{ url('/penulis/editprofile') }}"><i class="fas fa-pencil-alt"></i>Edit Profil</a>
      </li>
        
    <!-- Nav Item - Article -->
    <li class="nav-item">
        <a href="{{ url('/penulis/post') }}"><i class="fas fa-desktop"></i>Daftar Postingan</a>
    </li>
    
    <!-- Nav Item - New Article -->
    <li class="nav-item">
        <a href="{{ url('/penulis/tambahpost') }}"><i class="fas fa-book"></i>Tambah Postingan</a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

 @endsection

@section('content')

    <section class="counter">
        <div class="container" style="margin-left: 15%">
            <h1 style="text-align: center;">Hello, {{ auth()->user()->nama }}</h1>    
            </div>
        </div>
    </section><!-- End counter Section -->
    
@endsection
