@extends('template')
@section('title','form absensi')
@section('content')

<style>
  .select2-container .select2-selection--single {
    height: 38px !important; /* Samakan tinggi dengan input lainnya */
    padding: 6px 12px !important; /* Sesuaikan padding */
    border: 1px solid #ced4da; /* Warna border */
    border-radius: 5px; /* Sudut agar seragam */
    display: flex !important;
    align-items: center !important; /* Agar teks sejajar */
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: normal !important; /* Pastikan teks tidak terpotong */
    padding-left: 12px !important; /* Geser teks ke kanan */
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 38px !important; /* Sesuaikan tinggi panah */
    display: flex !important;
    align-items: center !important; /* Agar sejajar dengan teks */
}

</style>

<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0   d-xl-none ">
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
          <input type="text" name="search" class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
              placeholder="Search..." aria-label="Search..."
               />
      </div>
  </form>
  
      <!-- /Search -->
    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="{{asset ('assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="{{asset ('assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
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
              <a class="dropdown-item" href="#"> <i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span> </a>
            </li>
            <li>
              <a class="dropdown-item" href="#"> <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span> </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 icon-base bx bx-credit-card icon-md me-3"></i><span class="flex-grow-1 align-middle">Billing Plan</span>
                  <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                </span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider my-1"></div>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);"> <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span> </a>
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
                      <h5 class="mb-0">Form Adsensi</h5>
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
                    <form class="needs-validation" action="{{ route('admin.absensi.store') }}" method="POST" novalidate>
                      @csrf
                  
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="eskul">Eskul</label>
                          <div class="col-sm-10">
                              <input type="hidden" name="eskul_id" value="{{ $eskul->id_eskul }}">
                              <input type="text" class="form-control" value="{{ $eskul->nama_eskul }}" readonly>
                          </div>
                      </div>
                  
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="murid">Murid</label>
                          <div class="col-sm-10">
                              <select class="form-select select2" id="murid" name="pendaftaran_id" required>
                                  <option value="" disabled selected>Pilih murid</option>
                                  @foreach ($murid as $mur)
                                      <option value="{{ $mur->id_pendaftaran }}">{{ $mur->nama_murid }}</option>
                                  @endforeach
                              </select>
                              <div class="invalid-feedback">Silakan pilih murid.</div>
                          </div>
                      </div>
                  
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="status">Status</label>
                          <div class="col-sm-10">
                              <select class="form-select" id="status" name="status" required>
                                  <option value="" disabled selected>Pilih status absensi</option>
                                  @foreach ($statusAbsen as $status)
                                      <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                  @endforeach
                              </select>
                              <div class="invalid-feedback">Silakan pilih status.</div>
                          </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="name">Nilai</label>
                        <div class="col-sm-10">
                          <div class="input-group has-validation">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="name" name="nilai" placeholder="Masukan Nilai..."  />
                            <div class="invalid-feedback">masukan nilai terlebih dahulu</div>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="deskripsi">Catatan</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="deskripsi" name="catatan" rows="3" placeholder="masukan catatan..." ></textarea>
                          <div class="invalid-feedback">catatan harus diisi.</div>
                        </div>
                      </div>
                  
                      <div class="row justify-content-end">
                          <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                      </div>
                  </form>
                  
                  </div>
              </div>
          </div>
      </div>
  
      <!-- Inisialisasi Select2 -->
{{-- <script>
    $(document).ready(function() {
        $('#murid').select2({
            placeholder: "Pilih murid",
            allowClear: true
        });
    });
</script> --}}

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