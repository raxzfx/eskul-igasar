@extends('template')
@section('title', 'Pendaftaran')
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
  <div class="col-xxl">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Pendaftaran</h5>
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
        <form class="needs-validation" action="{{route('admin.pendaftaran.store')}}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
          
          <!-- Nama Eskul -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nama_eskul">Nama Murid</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_murid" name="nama_murid" placeholder="Masukkan nama murid..." required />
              <div class="invalid-feedback">Nama murid harus diisi.</div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nama_eskul">NIS</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan nis murid..." required />
              <div class="invalid-feedback">NIS murid harus diisi.</div>
            </div>
          </div>
          
          <!-- Deskripsi -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deskripsi">alasan</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="alasan" name="alasan" rows="3" placeholder="Deskripsikan eskul..." required></textarea>
              <div class="invalid-feedback">alasan harus diisi.</div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deskripsi">hobi</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="hobi" name="hobi" rows="3" placeholder="Deskripsikan eskul..." required></textarea>
              <div class="invalid-feedback">hobi harus diisi.</div>
            </div>
          </div>

          <div class="mb-4 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">tanggal daftar</label>
            <div class="col-md-10">
              <input class="form-control" type="date" value="" id="tgl_daftar" name="tgl_daftar" />
            </div>
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Eskul</label>
            <div class="col-sm-10">
                @if(count($eskuls) > 0)
                    @foreach($eskuls as $eskul)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="eskul{{ $eskul->id_eskul }}" 
                                   name="eskul_id[]" value="{{ $eskul->id_eskul }}" />
                            <label class="form-check-label" for="eskul{{ $eskul->id_eskul }}">{{ $eskul->nama_eskul }}</label>
                        </div>
                    @endforeach
                @else
                    <p class="text-danger">Tidak ada eskul tersedia.</p>
                @endif
            </div>
        </div>
        

          
          

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection
