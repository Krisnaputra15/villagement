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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Layanan /</span> Detail</h4>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Detail Layanan</h5>
          <!-- Account -->
          <hr class="my-0" />
          <div class="card-body">
            <form id="formAccountSettings" method="POST" action="{{url('/admin/layanan/'.$layanan->id.'/update')}}">
                <div class="row">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Layanan</label>
                        <input class="form-control" type="text" name="nama" id="nama" value="{{$layanan->nama_layanan}}"
                            placeholder="Nama Layanan" required/>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" type="text" name="deskripsi" id="deskripsi"
                            placeholder="Deskripsi Permohonan">{{$layanan->deskripsi}}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="status" class="form-label">Status Layanan</label>
                      <select id="status" name="status" class="select2 form-select">
                        @if($layanan->is_active == 0)
                        <option value="0" selected>Nonaktif</option>
                        <option value="1">Aktif</option>
                        @else
                        <option value="0">Nonaktif</option>
                        <option value="1" selected>Aktif</option>
                        @endif
                      </select>
                    </div>
                    <div class="mb-3" id="syaratBox">
                        <label for="syarat" class="form-label">Syarat</label>
                        @foreach($syarat as $s)
                        <div class="d-flex mb-2" style="gap: 15px">
                            <input class="form-control" type="text" name="syarat[]" id="syarat" value="{{$s}}"
                            placeholder="Syarat Permohonan" required/>
                            <button type="button" class="btn btn-success" onclick="add()"><i class="fa-sharp fa-solid fa-plus" style="color: #ffffff;"></i></button>
                            <button type="button" class="btn btn-danger" onclick="remove()"><i class="fa-sharp fa-solid fa-minus" style="color: #ffffff;"></i></button>
                        </div>
                        @endforeach
                    </div>
                  </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                <button type="reset" class="btn btn-outline-secondary" onclick="window.location.reload()">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
        <div class="card mb-4">
          <h5 class="card-header">Data Pengajuan Permohonan Surat</h5>
          <div class="table text-nowrap">
              @if (sizeof($permohonan) == 0)
                          <p class="text-center">Belum ada permohonan yang masuk untuk layanan ini</p>
                      @else
              <table class="table">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Pemohon</th>
                          <th>Tanggal Pengajuan</th>
                          <th>Status</th>
                          <th>Alasan Penolakan</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                      
                          @php $i = 1; @endphp
                          @foreach ($permohonan as $d)
                              <tr>
                                  <td>
                                      <p>{{ $i }}</p>
                                  </td>
                                  <td>{{ $d->user->nama }}</td>
                                  <td>{{ $d->created_at }}</td>
                                  <td><span
                                          class="badge bg-label-{{ $d->status == 'proses' ? 'warning' : ($d->status == 'diterima' ? 'danger' : 'success') }} me-1">{{ $d->status == 1 ? 'butuh verifikasi' : ($d->status == 'proses' ? 'Proses' : ($d->status == 'diterima' ? 'Diterima' : 'Ditolak')) }}</span>
                                  </td>
                                  <td>{{ strlen($d->declined_reason) == 0 ? "-" : $d->declined_reason }}</td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                              data-bs-toggle="dropdown" data-bs-target="#detail">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu" id="detail">
                                              <a class="dropdown-item" href="{{ url('/admin/permohonan/' . $d->id) }}"><i
                                                      class="bx bx-detail me-2"></i> Lihat detail</a>
                                              {{-- <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-edit-alt me-2"></i> Edit</a
                        > --}}
                                              <a class="dropdown-item"
                                                  href="{{ url('/admin/permohonan/' . $d->id . '/changeactivestatus') }}"><i
                                                      class="bx {{ $d->is_active == 0 ? 'bx-check' : 'bx-x' }} me-2"></i>{{ $d->is_active == 0 ? 'Aktivasi layanan' : 'Deaktivasi layanan' }}</a>
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
        <div class="card">
          <h5 class="card-header">Hapus Layanan</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Apakah anda benar-benar ingin menghapus layanan ini?</h6>
                <p class="mb-0">Layanan tidak akan bisa dikembalikan saat sudah dihapus dan semua permohonan yang berkaitan dengan layanan ini juga akan dihapus.</p>
              </div>
            </div>
            <form id="formAccountDeactivation" method="GET" action="{{url('/admin/layanan/'.$layanan->id.'/delete')}}">
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="accountActivation"
                  id="accountActivation"
                  required
                />
                <label class="form-check-label" for="accountActivation"
                  >Saya menyetujui penghapusan layanan ini</label
                >
              </div>
              <button type="submit" class="btn btn-danger deactivate-account">Hapus Layanan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('extra-scripts')
<script>
    function add() {
        var container = document.getElementById("syaratBox");
        var newDiv = document.createElement("div");
        newDiv.setAttribute("class", "d-flex");
        newDiv.style.gap = "15px";
        newDiv.style.marginTop = "10px";
        newDiv.innerHTML = `
            <input class="form-control" type="text" name="syarat[]" placeholder="Syarat Permohonan" />
            <button type="button" class="btn btn-success" onclick="add()" required><i class="fa-sharp fa-solid fa-plus" style="color: #ffffff;"></i></button>
            <button type="button" class="btn btn-danger" onclick="remove()"><i class="fa-sharp fa-solid fa-minus" style="color: #ffffff;"></i></button>
        `;
        container.appendChild(newDiv);
    }

    function remove() {
        var syaratBox = document.getElementById("syaratBox");
        var dFlexDivs = syaratBox.getElementsByClassName("d-flex");

        // Check if there are more than one d-flex divs
        if (dFlexDivs.length > 1) {
            syaratBox.removeChild(dFlexDivs[dFlexDivs.length - 1]);
        }
    }
</script>
@endsection