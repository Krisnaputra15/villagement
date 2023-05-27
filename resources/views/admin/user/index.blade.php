@extends('template.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if(session('error'))
    <div class="response error">
        <p class="text-center text-white my-auto">{{session('error')}}</p>
    </div>
    @endif
    @if(session('success'))
    <div class="response success">
        <p class="text-center text-white my-auto">{{session('success')}}</p>
    </div>
    @endif
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> {{$page}}</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Table Basic</h5>
      <div class="table text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Hak Akses</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @if(sizeof($user) == 0)
            <p class="text-center">Belum ada data user</p>
            @else
                @php $i = 1; @endphp
                @foreach($user as $u)
                <tr>
                    <td><p>{{$i}}</p></td>
                    <td>{{strlen($u->nik) == 0 ? 'Undefined' : $u->nik}}</td>
                    <td>{{$u->nama}}</td>
                    <td>{{$u->level == 1 ? 'Admin' : 'Warga'}}</td>
                    <td><span class="badge bg-label-{{$u->is_active == 0 ? 'danger' : 'success  '}} me-1">{{$u->is_active == 0 ? 'Nonaktif' : 'Aktif'}}</span></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" data-bs-target="#detail">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu" id="detail">
                          <a class="dropdown-item" href="{{url('/admin/users/'.$u->id)}}"
                            ><i class="bx bx-detail me-2"></i> Lihat detail</a
                          >
                          {{-- <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                          > --}}
                          <a class="dropdown-item" href="{{url('/admin/users/'.$u->id.'/changeactivestatus')}}"
                            ><i class="bx {{$u->is_active == 0 ? 'bx-check' : 'bx-x'}} me-2"></i>{{$u->is_active == 0 ? 'Aktivasi akun' : 'Deaktivasi akun'}}</a
                          >
                        </div>
                      </div>
                    </td>
                  </tr>
                  @php ++$i @endphp
                @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <div class="d-flex justify-content-center py-3">
        <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#tambahUserModal">Tambah user baru</a>
    </div>
    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAccountSettings" method="POST" action="{{url('/admin/users/store')}}">
                    <div class="row">
                        @csrf
                      <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input class="form-control" type="text" name="nik" id="nik" placeholder="NIK" maxlength="16" minlength="16"/>
                       </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama" />
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Email" />
                      </div>
                      <div class="mb-3">
                        <label for="dusun" class="form-label">Dusun</label>
                        <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Dusun" />
                      </div>
                      <div class="mb-3">
                        <label for="rt" class="form-label">RT</label>
                        <input class="form-control" type="number" maxlength="2" id="rt" name="rt" placeholder="Nomor RT" />
                      </div>
                      <div class="mb-3">
                        <label for="rw" class="form-label">RW</label>
                        <input class="form-control" type="number" maxlength="2" id="rw" name="rw" placeholder="Nomor RW" />
                      </div>
                      <div class="mb-3">
                        <label for="level" class="form-label">Otoritas</label>
                        <select id="level" name="level" class="select2 form-select">
                          <option value="" selected disabled>Pilih Otoritas</option>
                          <option value="1">Administrator</option>
                          <option value="2">Warga</option>
                        </select>
                      </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    <!--/ Basic Bootstrap Table -->
  </div>
@endsection