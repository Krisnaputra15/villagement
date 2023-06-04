@extends('template.template')

@section('content')
    {{-- <div class="single p-0">
                <div class="border-box container my-5 mx-auto p-5" style="border-radius: 20px;">
                    <div class="box w-50 mx-auto">
                        <div class="d-flex justify-content-center">
                            <img src="{{$user->picture_url}}" class="text-center mx-auto" alt="" style="border-radius: 50%;">
                        </div>
                        <h5 class="text-center mt-3">{{$user->nama}}</h5>
                        <p class="text-center">Dusun {{$user->dusun}}, RT {{$user->rt}} RW {{$user->rw}}</p>
                    </div>
                    
                    <form class="" action="" ></form>
                        <div class="d-flex flex-row justify-content-around">
                            <div class="box d-flex flex-column text-dark">
                                    <label for="nama">Nama</label>
                                    <input type="text" value="{{$user->nama}}" disabled>
                                    <label for="Email" >Email</label>
                                    <input type="text" value="{{$user->email}}" disabled>
                                    <label for="RT">RT</label>
                                    <input type="text" value="{{$user->rt}}" disabled>
                                </form>
                            </div>
                            <div class="box d-flex flex-column text-dark">
                                    <label for="NIK">NIK</label>
                                    <input type="text" value="{{$user->nik}}" disabled>
                                    <label for="Dusun">Dusun</label>
                                    <input type="text" value="{{$user->dusun}}" disabled>
                                    <label for="RW">RW</label>
                                    <input type="text" value="{{$user->rw}}" disabled>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <button class="btn btn-dark px-5 py-2" style="padding: 4px; background-color: #030f27; color: white;" class="mx-auto" type="submit">Simpan</button>
                        </div>
                    </form>

                </div>
               
    </div> --}}

    <section>
        <div class="container py-5">
            <div class="row d-flex flex-column">
                <div class="d-flex h-100 w-100 gap-5">
                    <div class="" style="width: 30%">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ $user->picture_url }}" alt="avatar" class="rounded-circle img-fluid"
                                    style="width: 150px;">
                                <h5 class="my-3">{{ $user->nama }}</h5>
                                <p class="text-muted mb-1">{{ $user->pekerjaan }}</p>
                                <p class="text-muted mb-0">Dusun {{ $user->dusun }}, RT {{ $user->rt }}, RW
                                    {{ $user->rw }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="" style="width: 70%">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->nama }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NIK</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->nik }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mobile</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">(098) 765-4321</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 class="mb-3">Milik anda</h3>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">

                            <div class="card-body">
                                <p class="mb-4">Pengajuan Permohonan Surat</p>
                                @if (sizeof($permohonan) == 0)
                                    <b>
                                        <p class="text-center">Anda belum mengajukan permohonan surat</p>
                                    </b>
                                @else
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Jenis Pengajuan</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                            @foreach ($permohonan as $item)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        <p class="mb-1" style="font-size: .88rem;">
                                                            {{ $item->layanan->nama_layanan }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-1 text-center my-auto" style="font-size: .88rem;">
                                                            <button disa
                                                                class="rounded-pill badge border-0 text-dark bg-{{ $item->status == 'proses' ? 'warning' : ($item->status == 'diterima' ? 'success' : 'danger') }}">{{ $item->status }}</button>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown" data-bs-target="#detail">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu" id="detail">
                                                                <a class="dropdown-item" href=""><i
                                                                        class="bx bx-detail me-2"></i> Lihat detail</a>
                                                                {{-- <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-2"></i> Edit</a
                          > --}}
                                                                <a class="dropdown-item" href=""><i
                                                                        class="bx "></i></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php ++$i @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                {{-- <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">

                            <div class="card-body p-0">
                                <p class="mb-4 pt-3 ps-3">Forum Permasalahan</p>
                                @if (sizeof($forum) == 0)
                                    <b>
                                        <p class="text-center">Anda belum membuat forum apapun</p>
                                    </b>
                                @else
                                @php $i = 1 @endphp
                                @foreach($forum as $data)
                                    <a href="{{url('forum/'.$data->id)}}">
                                        <div class="contents py-3">
                                            <div class="px-3">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p>#{{$i}} {{$data->judul}}</p>
                                                        <div class="d-flex flex-row" style="font-size: small; ">
                                                            <p class="ms-2 mb-0"
                                                                style="font-size: 12px; color: #807d7d!important;">
                                                                <b>{{$data->view_count}}</b>
                                                                Views
                                                            </p>
                                                            <p class="ms-4 mb-0"
                                                                style="font-size: 12px; color: #807d7d!important;">
                                                                <b>{{$data->upvote_count}}</b>
                                                                Votes
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <a href="" class="btn btn-sm btn-success"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                @endif
                                {{-- <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                <div class="progress rounded mb-2" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
