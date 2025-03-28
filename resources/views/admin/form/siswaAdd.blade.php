@extends('template')
@section('title', 'add siswa')
@section('content')

<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
      <i class="icon-base bx bx-menu icon-md"></i>
    </a>
  </div>
  <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
    <!-- Search -->
    <form method="GET" class="navbar-nav align-items-center me-auto">
      <div class="nav-item d-flex align-items-center">
        <span class="w-px-22 h-px-22">
          <i class="icon-base bx bx-search icon-md"></i>
        </span>
        <input type="text" name="search" class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none" placeholder="Search..." aria-label="Search...">
      </div>
    </form>
    <!-- /Search -->
    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mb-0">John Doe</h6>
                  <small class="text-body-secondary">Admin</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider my-1"></div>
          </li>
          <li>
            <a class="dropdown-item" href="#"><i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span></a>
          </li>
          <li>
            <a class="dropdown-item" href="#"><i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span></a>
          </li>
          <li>
            <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span></a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
<!-- / Navbar -->

<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Siswa</h5>
      </div>

      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="card-body">
        <form class="needs-validation" action="{{ route('admin.siswa.store') }}" method="POST" novalidate>
          @csrf
          <!-- Nama Lengkap -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Nama Lengkap</label>
            <div class="col-sm-10">
              <div class="input-group has-validation">
                <span class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" id="name" name="nama_siswa" placeholder="Masukan nama lengkap..." required />
                <div class="invalid-feedback">Nama lengkap harus diisi.</div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">username</label>
            <div class="col-sm-10">
              <div class="input-group has-validation">
                <span class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" id="name" name="username" placeholder="Masukan nama lengkap..." required />
                <div class="invalid-feedback">Nama lengkap harus diisi.</div>
              </div>
            </div>
          </div>

          <!-- No Telp -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="phone">No Telp</label>
            <div class="col-sm-10">
              <div class="input-group has-validation">
                <span class="input-group-text"><i class="bx bx-phone"></i></span>
                <input type="number" class="form-control" id="phone" name="no_telp" placeholder="Masukan nomor telepon..." required />
                <div class="invalid-feedback">Nomor telepon harus diisi.</div>
              </div>
            </div>
          </div>

          <!-- Select Jurusan -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="jurusan">Jurusan</label>
            <div class="col-sm-10">
              <select class="form-select" id="jurusan" name="nama_jurusan" required>
                <option value="" disabled selected>Pilih Jurusan</option>
                @foreach ($jurusan as $jurus )
                    <option value="{{$jurus->id_jurusan}}">{{$jurus->nama_jurusan}}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">Silakan pilih jurusan.</div>
            </div>
          </div>

          <!-- Select Tingkat Kelas -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="tingkat_kelas">Tingkat Kelas</label>
            <div class="col-sm-10">
              <select class="form-select" id="tingkat_kelas" name="tingkat_kelas" required>
                <option value="" disabled selected>Pilih Tingkat Kelas</option>
                <option value="10">X</option>
                <option value="11">XI</option>
                <option value="12">XII</option>
              </select>
              <div class="invalid-feedback">Silakan pilih tingkat kelas.</div>
            </div>
          </div>

        <div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="password">Password</label>
    <div class="col-sm-10">
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" 
                   placeholder="Masukkan password" aria-describedby="password" novalidate />
            <span class="input-group-text cursor-pointer" id="togglePassword">
                <i class="bx bx-hide"></i>
            </span>
        </div>
        <div class="invalid-feedback">Password harus diisi.</div>
    </div>
</div>

        

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Bootstrap Validation
  (function () {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.innerHTML = '<i class="bx bx-show"></i>';
            } else {
                passwordInput.type = "password";
                togglePassword.innerHTML = '<i class="bx bx-hide"></i>';
            }
        });
    });
</script>


@endsection
