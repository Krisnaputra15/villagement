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

        <h3 class="mb-4">Data Layanan <span style="font-weight:bold;">Villagement</span></h3>
        <!-- Basic Bootstrap Table -->
        <div class="card mb-3">
            <h5 class="card-header">Selesai</h5>
            <div class="table text-nowrap">
                @if (sizeof($forumDone) == 0)
                    <p class="text-center">Belum ada forum yang direspon oleh pihak desa</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Permasalahan</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Status</th>
                                <th>Nama Pembuat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php $i = 1; @endphp
                            @foreach ($forumDone as $data)
                                @php $date = new DateTime($data->created_at) @endphp
                                <tr>
                                    <td>
                                        <p>{{ $i }}</p>
                                    </td>
                                    <td>{{ $data->content }}</td>
                                    <td>{{ $date->format('d-m-Y') }}</td>
                                    <td><span
                                            class="badge bg-label-success me-1">Direspon</span>
                                    </td>
                                    <td>{{$data->user->nama}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" data-bs-target="#detail">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" id="detail">
                                                <a class="dropdown-item" href="{{ url('/admin/forums/' . $data->id) }}"><i
                                                        class="bx bx-detail me-2"></i> Lihat detail</a>
                                                {{-- <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                          > --}}
                                                
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
        <div class="card mb-3">
            <h5 class="card-header">Telah Diproses</h5>
            <div class="table text-nowrap">
                @if (sizeof($forumProcessed) == 0)
                    <p class="text-center">Belum ada forum yang diproses oleh pihak desa</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Permasalahan</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Status</th>
                                <th>Nama Pembuat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php $i = 1; @endphp
                            @foreach ($forumProcessed as $data)
                                @php $date = new DateTime($data->created_at) @endphp
                                <tr>
                                    <td>
                                        <p>{{ $i }}</p>
                                    </td>
                                    <td>{{ $data->content }}</td>
                                    <td>{{ $date->format('d-m-Y') }}</td>
                                    <td><span
                                            class="badge bg-label-warning me-1">Direspon</span>
                                    </td>
                                    <td>{{$data->user->nama}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" data-bs-target="#detail">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" id="detail">
                                                <a class="dropdown-item" href="{{ url('/admin/forums/' . $data->id) }}"><i
                                                        class="bx bx-detail me-2"></i> Lihat detail</a>
                                                {{-- <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                          > --}}
                                                
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
        <div class="card mb-3">
            <h5 class="card-header">Menunggu Verifikasi</h5>
            <div class="table text-nowrap">
                @if (sizeof($forumUnprocessed) == 0)
                    <p class="text-center">Tidak ada data forum yang belum diverifikasi, good job!</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Permasalahan</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Status</th>
                                <th>Nama Pembuat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php $i = 1; @endphp
                            @foreach ($forumUnprocessed as $data)
                                @if($data->is_ditutup == 0)
                                @php $date = new DateTime($data->created_at) @endphp
                                <tr>
                                    <td>
                                        <p>{{ $i }}</p>
                                    </td>
                                    <td>{{ $data->content }}</td>
                                    <td>{{ $date->format('d-m-Y') }}</td>
                                    <td><span
                                            class="badge bg-label-danger me-1">Belum direspon</span>
                                    </td>
                                    <td>{{$data->user->nama}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" data-bs-target="#detail">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" id="detail">
                                                <a class="dropdown-item" href="{{ url('/admin/forums/' . $data->id) }}"><i
                                                        class="bx bx-detail me-2"></i> Lihat detail</a>
                                                {{-- <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                          > --}}
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php ++$i @endphp
                                @endif
                            @endforeach
                @endif
                </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
