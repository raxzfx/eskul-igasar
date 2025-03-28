@extends('templateGuru')
@section('title', 'Tambah Ekstrakurikuler')
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
        <h5 class="mb-0">Tambah Ekstrakurikuler</h5>
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
        <form class="needs-validation" action="{{route('guru.eskulStore')}}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
          
          <!-- Nama Eskul -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="nama_eskul">Nama Eskul</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_eskul" name="nama_eskul" placeholder="Masukkan nama eskul..." required />
              <div class="invalid-feedback">Nama eskul harus diisi.</div>
            </div>
          </div>
          
          <!-- Deskripsi -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsikan eskul..." required></textarea>
              <div class="invalid-feedback">Deskripsi harus diisi.</div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="jurusan">hari</label>
            <div class="col-sm-10">
              <select class="form-select" id="jurusan" name="hari" required>
                <option value="" disabled selected>Pilih hari</option>
                <option value="senin">senin</option>
                <option value="selasa">selasa</option>
                <option value="rabu">rabu</option>
                <option value="kamis">kamis</option>
                <option value="jumat">jumat</option>
                <option value="sabtu">sabtu</option>
                <option value="minggu">minggu</option>
              </select>
              <div class="invalid-feedback">Silakan pilih jurusan.</div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="jurusan">guru</label>
            <div class="col-sm-10">
              <select class="form-select" id="jurusan" name="pembina" required>
                <option value="" disabled selected>Pilih guru</option>
                @foreach ($guru as $gu )
                @if ($gu->role == 'pembina')
                <option value="{{$gu->id_guru}}">{{$gu->nama_guru}}</option>
                @endif
                @endforeach
              </select>
              <div class="invalid-feedback">Silakan pilih jurusan.</div>
            </div>
          </div>
          
          <div class="mb-4 row">
            <label for="start-time" class="col-md-2 col-form-label">Jam Mulai</label>
            <div class="col-md-4">
                <input class="form-control" type="time" id="start-time" name="jam_mulai" value="" required />
            </div>
        
            <label for="end-time" class="col-md-2 col-form-label text-md-end">Jam Selesai</label>
            <div class="col-md-4">
                <input class="form-control" type="time" id="end-time" name="jam_selesai" value="" required />
            </div>
        </div>
        

          <!-- Tempat -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tempat</label>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tempat1" name="tempat[]" value="Ruang Kelas" />
                <label class="form-check-label" for="tempat1">Ruang Kelas</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tempat2" name="tempat[]" value="Lapangan" />
                <label class="form-check-label" for="tempat2">Lapangan</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tempat3" name="tempat[]" value="Aula" />
                <label class="form-check-label" for="tempat3">Aula</label>
              </div>
            </div>
          </div>
          
          
          <!-- Upload Gambar -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required />
              <div class="invalid-feedback">Silakan upload gambar eskul.</div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Tambah Eskul</button>
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
