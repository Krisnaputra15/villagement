@extends('template.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('error'))
            <div class="response error">
                <p class="text-center text-white my-auto">{{ session('error') }}</p>
            </div>
        @endif
        @if (session('success'))
            <div class="response success">
                <p class="text-center text-white my-auto">{{ session('success') }}</p>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forum /</span> Detail</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detail Forum</h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pemohon</label>
                                <input class="form-control" type="text" name="nama" id="nama"
                                    value="{{ $data->user->nama }}" placeholder="Nama Layanan" disabled />
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Tanggal Pembuatan</label>
                                <input type="text" class="form-control" type="text" name="deskripsi" id="deskripsi"
                                    value="{{ $data->created_at }}" placeholder="Deskripsi Permohonan" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Status</label>
                                <input type="text" class="form-control" type="text" name="deskripsi" id="deskripsi"
                                    value="{{ $data->status }}" placeholder="Deskripsi Permohonan" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Jumlah Dilihat</label>
                                <input type="text" class="form-control" type="text" name="deskripsi" id="deskripsi"
                                    value="{{ $data->view_count }}" placeholder="Deskripsi Permohonan" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Jumlah Upvote</label>
                                <input type="text" class="form-control" type="text" name="deskripsi" id="deskripsi"
                                    value="{{ $data->upvote_count }}" placeholder="Deskripsi Permohonan" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Permasalahan</label>
                                <div class="rounded-3 p-3" style="background-color: #eceef1; color: #697a8d">
                                    @if(sizeof($data->forum_media) != 0)
                                      <div class="image-container">
                                        @php $i = 1 @endphp
                                        @foreach ($data->forum_media as $media)
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#imageModal{{ $i }}"><img
                                                    src="{{ secure_asset('storage/forum/' . $media['nama_file']) }}"
                                                    alt="Image 1"></a>
                                            <div class="modal fade" id="imageModal{{ $i }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header p-0"
                                                            style="margin: 0.875rem 1.25rem -0.125rem auto !important;">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-1">
                                                            <img src="{{ secure_asset('storage/forum/' . $media['nama_file']) }}"
                                                                alt="Image 1" style="width: 36em !important;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php ++$i @endphp
                                        @endforeach
                                    </div>
                                    @endif
                                    <p>{{ $data->content }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                data-bs-target="#beriResponModal">Beri Respon</button>
                            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal"
                                data-bs-target="#ubahStatusModal">Ubah Status Forum</button>
                            <a href="{{ url('admin/forums/' . $data->id . '/' . ($data->is_ditutup == 0 ? 'tutup' : 'buka')) }}"
                                class="btn {{ $data->is_ditutup == 0 ? 'btn-danger' : 'btn-success' }} btn-outline-secondary">{{ $data->is_ditutup == 0 ? 'Tutup Forum' : 'Buka Forum' }}</a>
                        </div>
                        <div class="modal fade" id="beriResponModal" tabindex="-1" aria-labelledby="beriResponModal"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="beriResponModal">Beri respon</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formLayananSettings" method="POST"
                                            action="{{ url('admin/forums/' . $data->id . '/respon') }}">
                                            <div class="row">
                                                @csrf
                                                <div class="form-check form-check-inline mb-3 ms-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="isBalasanKustom" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Beri balasan
                                                        menggunakan template</label>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Balasan Kustom</label>
                                                    <textarea class="form-control" type="text" name="deskripsi" id="nama"
                                                        placeholder="Tidak perlu diisi jika menggunakan balasan template"></textarea>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ubahStatusModal" tabindex="-1" aria-labelledby="ubahStatusModal"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="ubahStatusModal">Ubah Status Forum</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formLayananSettings" method="POST"
                                            action="{{ url('admin/forums/' . $data->id . '/ubahstatus') }}">
                                            <div class="row">
                                                @csrf
                                                <div class="form-check mb-3 px-3">
                                                    <label for="status">Pilih Status</label>
                                                    <select id="status" name="status" class="select2 form-select">
                                                        @if ($data->status == 'menunggu')
                                                            <option value="menunggu" selected>Menunggu</option>
                                                            <option value="proses">Proses</option>
                                                            <option value="selesai">Selesai</option>
                                                        @elseif($data->status == 'proses')
                                                            <option value="menunggu">Menunggu</option>
                                                            <option value="proses" selected>Proses</option>
                                                            <option value="selesai">Selesai</option>
                                                        @else
                                                            <option value="menunggu">Menunggu</option>
                                                            <option value="proses">Proses</option>
                                                            <option value="selesai" selected>Selesai</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Ubah Status</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>

                {{-- <div class="card">
          <h5 class="card-header">Hapus Layanan</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Apakah anda benar-benar ingin menghapus layanan ini?</h6>
                <p class="mb-0">Layanan tidak akan bisa dikembalikan saat sudah dihapus dan semua permohonan yang berkaitan dengan layanan ini juga akan dihapus.</p>
              </div>
            </div>
            <form id="formAccountDeactivation" method="GET" action="{{url('/admin/layanan/'.$data->id.'/delete')}}">
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
        </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script>
        $(document).ready(function() {
            $('#imageModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var image = button.data('image');
                var modalImage = $(this).find('#modal-image');

                modalImage.attr('src', image);
            });
        });
    </script>
@endsection
