@extends('template')
@section('title', 'table eskul')
@section('content')

<style>
    .swal2-container {
        z-index: 9999 !important;
    }
    .swal2-toast {
        display: flex !important;
        align-items: center !important; /* Sejajarkan icon dan teks */
        background-color: #fff !important; /* Warna putih */
        color: #333 !important; /* Warna teks gelap */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1) !important;
        border-radius: 8px !important;
        padding: 12px 18px !important; /* Tambah padding agar lebih sedang */
        min-height: 50px !important; /* Tinggi lebih sedang */
    }
    
    .swal2-icon {
        width: 28px !important; /* Ukuran icon lebih sedang */
        height: 28px !important;
        margin-right: 10px !important; /* Beri jarak lebih proporsional */
    }

    .swal2-title {
        font-size: 16px !important; /* Ukuran font lebih sedang */
        font-weight: 500 !important;
        margin: 0 !important;
        line-height: 1.4 !important;
    }
    .swal2-title-custom {
        text-align: center !important; /* Teks di tengah */
        font-size: 18px !important; /* Ukuran teks sama */
        font-weight: 500 !important;
    }
    .swal2-popup-custom {
        padding: 20px !important; /* Padding lebih pas */
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
<form method="GET" action="{{ route('admin.eskul.index') }}" class="navbar-nav align-items-center me-auto">
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
        <h1 class="fw-bold">eskul</h1>
        <div class="card">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                <span>eskul table</span>
                <a href="{{route('admin.eskul.create')}}" class="btn btn-primary">
                    <span class="icon-base bx bx-plus-circle icon-sm me-2"></span>add data
                </a>
            </h5>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>no</th>
                    <th>nama eskul</th>
                    <th>deskripsi</th>
                    <th>hari</th>
                    <th>pembina</th>
                    <th>jam mulai</th>
                    <th>jam selesai</th>
                    <th>tempat</th>
                    <th>gambar</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ( $eskul as $kul )
                  <tr>
                    <td>{{ ($eskul->currentPage() - 1) * $eskul->perPage() + $loop->iteration }}</td>
                    <td>{{$kul->nama_eskul}}</td>
                    <td>
                          <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$kul->deskripsi}}">deskripsi</button>

                <!-- Modal -->
                <div class="modal fade" id="modalCenter{{$kul->deskripsi  }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                       {{$kul->deskripsi}}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                    </td>
                    <td>{{ $kul->hari}}</td>
                    <td>{{ $kul->guru->nama_guru}}</td>
                    <td>{{ $kul->jam_mulai}}</td>
                    <td>{{ $kul->jam_selesai}}</td>
                    <td>
                        @foreach (explode(',', $kul->tempat) as $tempat)
                        <span class="badge bg-primary">{{ trim($tempat) }}</span>
                    @endforeach
                    </td>
                    <td>
                         @if ($kul->gambar)
                    <img src="{{ asset($kul->gambar) }}" width="100" alt="Gambar Eskul">
                @else
                    <p>Tidak ada gambar</p>
                @endif
                    </td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('admin.eskul.edit', $kul->id_eskul)}}">
                              <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                          </a>
                          <form action="{{ route('admin.eskul.destroy', $kul->id_eskul ) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item delete-btn">
                                <i class="icon-base bx bx-trash me-1"></i> Delete
                            </button>
                        </form>
                        </div>
                      </div>
                    </td>
                 
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mx-4 mt-3">
                   {{ $eskul->links() }}
              </div>
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