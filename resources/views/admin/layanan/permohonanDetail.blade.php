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
        <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Layanan / {{ $data->layanan->nama_layanan }} /
                Detail</span> </h4>

        <a class="btn btn-secondary mb-4" href="{{ url()->previous() }}">Kembali</a>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detail Permohonan</h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                            <div class="row">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pemohon</label>
                                    <input class="form-control" type="text" name="nama" id="nama"
                                        value="{{ $data->user->nama }}" placeholder="Nama Layanan" disabled />
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Tanggal Pengajuan</label>
                                    <input class="form-control" type="text" name="deskripsi" id="deskripsi"
                                        value="{{ $data->created_at }}" placeholder="Deskripsi Permohonan" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Status</label>
                                    <input class="form-control" type="text" name="deskripsi" id="deskripsi"
                                        value="{{ $data->status }}" placeholder="Deskripsi Permohonan" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Alasan Penolakan</label>
                                    <input class="form-control" type="text" name="deskripsi" id="deskripsi"
                                        value="{{ $data->declined_reason == null ? '-' : $data->declined_reason }}" placeholder="Deskripsi Permohonan" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Lampiran Pengajuan</label>
                                    @foreach ($data->kelengkapan_permohonans as $item)
                                        <div class="d-flex justify-content-between gap-3 mb-3">
                                            <input class="form-control " style="width:85%" type="text" name="item[]"
                                                id="" value="{{ $item['nama_file'] }}" disabled>
                                            <a class="btn btn-success" style="width:15%"
                                                href="{{ asset('storage/permohonan/' . $item['nama_file']) }}"
                                                target="_blank">Lihat file</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="{{ url('admin/permohonan/' . $data->id . '/terima') }}"
                                    class="btn btn-success text-white me-2">Terima Pengajuan</a>
                                <a class="btn btn-danger text-white" data-bs-toggle="modal"
                                    data-bs-target="#ubahStatusModal">Tolak Pengajuan</a>
                            </div>
                            <div class="modal fade" id="ubahStatusModal" tabindex="-1" aria-labelledby="ubahStatusModal"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="ubahStatusModal">Tolak Pengajuan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formLayananSettings" method="POST"
                                                action="{{ url('admin/permohonan/' . $data->id . '/tolak') }}">
                                                <div class="row">
                                                    @csrf
                                                    <div class="form-check mb-3 px-3">
                                                        <label for="status">Pilih Status</label>
                                                        <select id="status" name="alasan" class="select2 form-select"
                                                            required>
                                                            <option value="Data kurang lengkap" selected>Data kurang lengkap
                                                            </option>
                                                            <option value="Format lampiran tidak sesuai">Format lampiran
                                                                tidak sesuai</option>
                                                            <option value="kustom">Alasan lain</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Balasan Kustom</label>
                                                        <textarea class="form-control" type="text" name="alasan_kustom" id=""
                                                            placeholder="Tidak perlu diisi jika menggunakan pilihan alasan tersedia"></textarea>
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

            </div>
        </div>
    @endsection
