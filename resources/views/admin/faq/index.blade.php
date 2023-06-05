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
        <h4 class="fw-bold py-3 mb-3"><span class="text-muted fw-light">Home /</span> {{ $page }}</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card mb-3">
            <h5 class="card-header">Data FAQ <span style="font-weight:bold;">Villagement</span></h5>
            <div class="table text-nowrap">
                @if (sizeof($data) == 0)
                    <p class="text-center">Belum ada FAQ yang terdaftar</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php $i = 1; @endphp
                            @foreach ($data as $item)
                                @php $date = new DateTime($item->created_at) @endphp
                                <tr>
                                    <td>
                                        <p>{{ $i }}</p>
                                    </td>
                                    <td>{{ $item->pertanyaan }}</td>
                                    <td><span
                                            class="badge bg-label-{{ $item->is_active == 1 ? 'success' : 'danger' }} me-1">{{ $item->is_active == 1 ? 'Aktif' : 'Nonaktif' }}</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" data-bs-target="#detail">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" id="detail">
                                                <a class="dropdown-item" href="{{ url('/admin/faqs/' . $item->id) }}"><i
                                                        class="bx bx-detail me-2"></i> Lihat detail</a>
                                                {{-- <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                          > --}}
                                                <a class="dropdown-item"
                                                    href="{{ url('/admin/faqs/' . $item->id . '/changeactivestatus') }}"><i
                                                        class="bx {{ $item->is_active == 0 ? 'bx-check' : 'bx-x' }} me-2"></i>{{ $item->is_active == 0 ? 'Aktivasi pertanyaan' : 'Deaktivasi pertanyaan' }}</a>
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
            <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#tambahFaqModal">Tambah data
                baru</a>
        </div>
        <div class="modal fade" id="tambahFaqModal" tabindex="-1" aria-labelledby="tambahFaqModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data FAQ</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formLayananSettings" method="POST" action="{{ url('/admin/faqs/store') }}">
                            <div class="row">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Pertanyaan</label>
                                    <input class="form-control" type="text" name="pertanyaan" id="pertanyaan"
                                        placeholder="Tulis Pertanyaan" />
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Jawaban</label>
                                    <textarea class="form-control" type="text" name="jawaban" id="jawaban" placeholder="Tulis Jawaban"></textarea>
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
