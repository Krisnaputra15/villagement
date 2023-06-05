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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> {{ $page }}</h4>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Data Layanan <span style="font-weight:bold;">Villagement</span></h5>
            <div class="table text-nowrap">
                @if (sizeof($data) == 0)
                    <p class="text-center">Belum ada data layanan</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php $i = 1; @endphp
                            @foreach ($data as $d)
                                <tr>
                                    <td>
                                        <p>{{ $i }}</p>
                                    </td>
                                    <td>{{ $d->nama_layanan }}</td>
                                    <td><span
                                            class="badge bg-label-{{ $d->is_active == 0 ? 'danger' : 'success  ' }} me-1">{{ $d->is_active == 0 ? 'Nonaktif' : 'Aktif' }}</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" data-bs-target="#detail">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" id="detail">
                                                <a class="dropdown-item" href="{{ url('/admin/layanan/' . $d->id) }}"><i
                                                        class="bx bx-detail me-2"></i> Lihat detail</a>
                                                {{-- <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                          > --}}
                                                <a class="dropdown-item"
                                                    href="{{ url('/admin/layanan/' . $d->id . '/changeactivestatus') }}"><i
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
        <div class="d-flex justify-content-center py-3">
            <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#tambahdataModal">Tambah data
                baru</a>
        </div>
        <div class="modal fade" id="tambahdataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formLayananSettings" method="POST" action="{{ url('/admin/layanan/store') }}">
                            <div class="row">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="nama" id="nama"
                                        placeholder="Nama Layanan" />
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi Permohonan"></textarea>
                                </div>
                                 <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Template Surat</label>
                                    <textarea class="form-control" type="text" name="template" id="template" placeholder="Deskripsi Permohonan"></textarea>
                                </div>
                                <div class="mb-3" id="syaratBox">
                                    <label for="syarat" class="form-label">Syarat</label>
                                    <div class="d-flex" style="gap: 15px">
                                        <input class="form-control" type="text" name="syarat[]" id="syarat"
                                            placeholder="Syarat Permohonan" required />
                                        <button type="button" class="btn btn-success" onclick="add()"><i
                                                class="fa-sharp fa-solid fa-plus" style="color: #ffffff;"></i></button>
                                        <button type="button" class="btn btn-danger" onclick="remove()"><i
                                                class="fa-sharp fa-solid fa-minus" style="color: #ffffff;"></i></button>
                                    </div>

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

@section('extra-scripts')
    <script>
        var formfield = document.getElementById('formLayananSettings');
        var elementBox = document.getElementById('syaratBox');
        var elementForm = document.getElementById('syarat');

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
