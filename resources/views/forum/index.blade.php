@extends('template.template')

@section('content')
    <div class="container my-4 h-100">
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
        <div class="d-flex">
            <div class="border-box container p-4 m-3" style="border-radius: 20px;width: 70%;">
                <h2>Forum Sarana Prasarana</h2>
                <div class="d-flex p-3 mt-3">
                    <img class="rounded-circle" src="{{auth()->user()->picture_url}}" style="width: 2em; height: 2em;" alt="">
                    <div class="d-flex flex-column">
                        <form action="{{ url('/forum/store') }}" method="POST" class="ms-3" style="width: 120%" enctype="multipart/form-data">
                            @csrf
                            <input class=""
                                style="border-radius: 30px; resize: none; width: 100%; height: 3em; padding: 8px 12px; border:1px solid #999; font-size: 14px;" type="text"
                                name="judul" id="" placeholder="Judul">
                            <textarea class="mt-3"
                                style="resize: none; width: 100%; height: 10em; padding: 8px 12px; font-size: 14px; border-radius: 20px; border: 1px solid #999;"
                                name="deskripsi" id="" placeholder="Tulis keluhan Anda"></textarea>
                            <div class="text-center d-flex mt-3 justify-content-between" style="gap: 24em;">
                                <div class="d-flex flex-row my-auto" style="gap: 1em; color: #030f27;">
                                    <a data-bs-toggle="modal" data-bs-target="#addImageModal"><i
                                            class="fa-solid fa-image form-btn"></i></a>
                                </div>
                                <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModal"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="addImageModal">Tambah gambar</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-3" id="syaratBox">
                                                        <div class="d-flex" style="gap: 15px">
                                                            <input class="form-control" type="file" name="gambar[]"
                                                                id="syarat" placeholder="Syarat Permohonan" required />
                                                            <button type="button" class="btn btn-success"
                                                                onclick="add()"><i class="fa-sharp fa-solid fa-plus"
                                                                    style="color: #ffffff;"></i></button>
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="remove()"><i class="fa-sharp fa-solid fa-minus"
                                                                    style="color: #ffffff;"></i></button>
                                                        </div>

                                                    </div>

                                                </div>
                                                <button type="button" class="btn btn-primary" class="btn-close"
                                                    data-bs-dismiss="modal">Simpan Gambar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn" type="submit" href="#"
                                    style="background-color: #030f27; color: white;">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="m-3" style=" width: 30%;">
                <div class="sidebar-widget wow fadeInUp  px-3">
                    <div class="search-widget">
                        <form class="d-flex">
                            <input class="form-control border-box" type="text" placeholder="Search Keyword"
                                style="border-right: none; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                            <button class="btn border-box"
                                style="border-left: none !important; border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;"><i
                                    class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- <form action="" method="get" class="d-flex" style="border-radius: 20px;" >
                                <input type="text" class="px-2 py-1" name="" id="" style="box-sizing: border-box; width: 95%; border: 1px solid; border-right: none;">
                                <button style="border: 1px solid;border-left: none; background: none;" type="submit">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </form> -->
                <div class="border-box py-4 m-3" style="border-radius: 20px;">
                    <h5 class="px-3">Sedang Populer</h5>
                    @if (sizeof($forumTrending) == 0)
                        <p class="px-3 pt-3">Belum ada forum yang populer</p>
                    @else
                    @php $i = 1; @endphp
                    @foreach($forumTrending as $data)
                        <a href="{{url('forum/'.$data->id)}}">
                            <div class="contents px-3 py-3">
                                <p>#{{$i}} {{$data->judul}}</p>
                                <div class="d-flex flex-row" style="font-size: small; ">
                                    <p class="ms-2 mb-0" style="font-size: 12px; color: #807d7d!important;"><b>{{$data->view_count}}</b> Views
                                    </p>
                                    <p class="ms-4 mb-0" style="font-size: 12px; color: #807d7d!important;"><b>{{$data->upvote_count}}</b> Votes
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>

        <div class="border-box m-3" style="border-radius: 20px;">

            <div class="py-4">
                <h5 class="pb-2 px-4">Diskusi Terbaru</h5>
                @if (sizeof($forumTerbaru) == 0)
                    <p class="px-4 pt-3">Belum ada forum dibuat</p>
                @else
                @foreach($forumTerbaru as $data)
                    <a href="{{url('forum/'.$data->id)}}">
                        <div class="contents py-2 px-4">
                            <div class="rounded-top rounded-bottom mt-3 mb-4">
                                <div class="d-flex flex-row profil mb-3">
                                    <img class="rounded-circle me-3 my-auto" src="{{$data->user->picture_url}}"
                                        style="width: 2em; height: 2em;" alt="">
                                    <div class="d-flex flex-column">
                                        <p class="mb-1" style="color: #222; font-weight: 600;">{{$data->judul}}</p>
                                        <p class="my-auto" style="font-size: 12px;">{{$data->user->nama}}</p>
                                    </div>
                                </div>
                                <div class="image-container">
                                    @foreach($data->forum_media as $media)
                                        <img src="{{asset('storage/forum/'.$media['nama_file'])}}" alt="Image 1" />
                                    @endforeach
                                </div>
                                <p style="font-size: 14px; color: #222;">{{$data->content}}
                                </p>
                            </div>
                            <div class="d-flex flex-row justify-content-between" style="font-size: small; ">
                                <div class="d-flex">
                                    <p class="ms-2 mb-0" style="font-size: 12px; color: #807d7d!important;"><b>{{$data->view_count}}</b> Views
                                    </p>
                                    <p class="ms-4 mb-0" style="font-size: 12px; color: #807d7d!important;"><b>{{$data->upvote_count}}</b> Votes
                                    </p>
                                </div>
                                @php $date = new DateTime($data->created_at) @endphp
                                <p style="font-size: 12px; color: #807d7d!important;">Dibuat pada {{$date->format('d-m-Y') }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <hr class="solid m-0">
                @endif
            </div>
        </div>
    </div>
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
            <input class="form-control" type="file" name="gambar[]"
                                                                    id="syarat" placeholder="Syarat Permohonan"
                                                                    required />
                                                                <button type="button" class="btn btn-success"
                                                                    onclick="add()"><i class="fa-sharp fa-solid fa-plus"
                                                                        style="color: #ffffff;"></i></button>
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="remove()"><i class="fa-sharp fa-solid fa-minus"
                                                                        style="color: #ffffff;"></i></button>
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
