@extends('template')
@section('title', 'table pendaftaran')
@section('content')

<style>
    .swal2-container {
        z-index: 9999 !important;
    }
    .swal2-toast {
        display: flex !important;
        align-items: center !important;
        background-color: #fff !important;
        color: #333 !important;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1) !important;
        border-radius: 8px !important;
        padding: 12px 18px !important;
        min-height: 50px !important;
    }
    
    .swal2-icon {
        width: 28px !important;
        height: 28px !important;
        margin-right: 10px !important;
    }

    .swal2-title {
        font-size: 16px !important;
        font-weight: 500 !important;
        margin: 0 !important;
        line-height: 1.4 !important;
    }
    .swal2-title-custom {
        text-align: center !important;
        font-size: 18px !important;
        font-weight: 500 !important;
    }
    .swal2-popup-custom {
        padding: 20px !important;
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
<form method="GET" action="{{ route('admin.pendaftaran.index') }}" class="navbar-nav align-items-center me-auto">
    <div class="nav-item d-flex align-items-center">
        <span class="w-px-22 h-px-22">
            <i class="icon-base bx bx-search icon-md"></i>
        </span>
        <input type="text" name="search" class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
            placeholder="search..." aria-label="Search..."
            value="{{ request('search') }}" />
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
                <h6 class="mb-0">{{ Auth::guard('admin')->user()->username }}</h6> 
                <small class="text-body-secondary">Admin</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider my-1"></div>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item" style="border: none; background: none; cursor: pointer;">
                <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span>
            </button>
        </form>            </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
</nav>
<!-- / Navbar -->

    <!-- Hoverable Table rows -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1 class="fw-bold">pendaftaran</h1>
        <div class="card">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                <span>pendaftaran table</span>
                <a href="{{route('admin.pendaftaran.create')}}" class="btn btn-primary">
                    <span class="icon-base bx bx-plus-circle icon-sm me-2"></span>add data
                </a>
            </h5>
            @foreach ($eskuls as $eskul)
            <div class="table-responsive text-nowrap">
              
                <h4 class="mt-4 ms-5">{{ $eskul->nama_eskul }}</h4>
                <table class="table table-hover mb-5 ">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama murid</th>
                            <th>nis</th>
                            <th>alasan</th>
                            <th>hobi</th>
                            <th>tgl daftar</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($eskul->pendaftarans as $daftar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $daftar->nama_murid }}</td>
                            <td>{{ $daftar->nis }}</td>
                            <td>{{ $daftar->alasan }}</td>
                            <td>{{ $daftar->hobi }}</td>
                            <td>{{ $daftar->tgl_daftar }}</td>
                            <td>
                                @if ($daftar->pivot->status == 'pending')
                                <div class="badge bg-label-warning"> {{ $daftar->pivot->status }}</div>
                                @elseif ($daftar->pivot->status == 'approve')
                                <div class="badge bg-label-success"> {{ $daftar->pivot->status }}</div>
                                @elseif ($daftar->pivot->status == 'reject')
                                <div class="badge bg-label-danger"> {{ $daftar->pivot->status }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Form untuk Approve -->
                                        <form action="{{ route('admin.pendaftaran.updateStatus', [$daftar->id_pendaftaran, $eskul->id_eskul]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="approve">
                                            <button type="submit" class="dropdown-item">
                                                <i class="icon-base bx bx-check-circle me-1"></i> Approve
                                            </button>
                                        </form>
                            
                                        <!-- Form untuk Reject -->
                                        <form action="{{ route('admin.pendaftaran.updateStatus', [$daftar->id_pendaftaran, $eskul->id_eskul]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="reject">
                                            <button type="submit" class="dropdown-item">
                                                <i class="icon-base bx bx-x-circle me-1"></i> Reject
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-form").forEach(form => {
                form.addEventListener("submit", function (e) {
                    e.preventDefault(); // Mencegah form langsung terkirim
    
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Batal",
                        customClass: {
                            title: "swal2-title-custom",
                            popup: "swal2-popup-custom"
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Kirim form jika user menekan "Ya, Hapus!"
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @if(session('success'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: "#fff",  // Warna background lebih gelap
                    color: "#333", // Warna teks putih
                    customClass: {
                        popup: 'swal2-toast'
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
        
                Toast.fire({
                    icon: "success",
                    title: "{{ session('success') }}"
                });
            @endif
        });
        </script>
        
        
  <!--/ Hoverable Table rows -->
  @endsection