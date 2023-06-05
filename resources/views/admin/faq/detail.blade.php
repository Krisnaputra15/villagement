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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">FAQ /</span> Detail</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detail Pertanyaan</h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <form action="{{ url('admin/faqs/' . $data->id . '/update') }}" method="POST">
                            @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Pertanyaan</label>
                                <input class="form-control" type="text" name="pertanyaan" id="pertanyaan"
                                    value="{{ $data->pertanyaan }}" placeholder="Tulis Pertanyaan" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Jawaban</label>
                            <textarea class="form-control" type="text" name="jawaban" id="jawaban" placeholder="Tulis Jawaban">{{ $data->jawaban }}</textarea>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                onclick="window.location.reload()">Cancel</button>
                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

                <div class="card">
                    <h5 class="card-header">Hapus FAQ</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Apakah anda benar-benar ingin menghapus pertanyaan ini?
                                </h6>
                                <p class="mb-0">pertanyaan tidak akan bisa dikembalikan saat sudah dihapus.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" method="POST"
                            action="{{ url('/admin/faqs/' . $data->id . '/delete') }}">
                            @csrf
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="faqDelete" id="faqDelete" required />
                                <label class="form-check-label" for="faqDelete">Saya menyetujui penghapusan pertanyaan
                                    ini</label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Hapus Pertanyaan</button>
                        </form>
                    </div>
                </div>
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
