@extends('template.template')

@section('content')
    <div class="single p-0">
        <div class="container pt-5 pb-3">
            <div class="rounded-top rounded-bottom mb-4">
                <h5 style="color: #030f27; font-size: 20px">{{ $data->judul }}</h5>
                <div class="d-flex flex-row profil mb-3">
                    <img class="rounded-circle me-2" src="{{ $data->user->picture_url }}" style="width: 2em; height: 2em"
                        alt="" />
                    <p class="my-auto" style="font-size: 12px">Ditulis oleh {{ $data->user->nama }}</p>
                </div>
                <div class="image-container">
                    @foreach ($data->forum_media as $media)
                        <img src="{{ asset('storage/forum/' . $media['nama_file']) }}" alt="Image 1" />
                    @endforeach
                </div>
                <p style="color: #222; font-size: 14px">
                    {{ $data->content }}
                </p>
                <hr class="solid" />
                <div class="d-flex flex-row pt-3" style="font-size: small">
                    <p class="ms-2"><b>{{ $data->view_count }}</b> Views</p>
                    <p class="ms-4"><b>{{ $data->upvote_count }}</b> Votes</p>
                </div>
                <hr class="solid" />
            </div>
        </div>
        <div class="container">
            <div class="d-flex">
                <img class="rounded-circle" src="{{ $data->user->picture_url }}" style="width: 2em; height: 2em"
                    alt="" />
                <form action="{{ url('forum/' . $data->id . '/comment') }}" method="POST" class="ms-3 d-flex gap-2" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column gap-2">
                    <textarea style=" resize: none; width: 750px; height: 10em; padding: 8px 8px; border: none; font-size: 14px; " name="deskripsi" id="" placeholder="Tulis respon anda"></textarea>
                    <a data-bs-toggle="modal" data-bs-target="#addImageModal"><i
                                            class="fa-solid fa-image form-btn"></i></a>
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
                                                <input class="form-control" type="file" name="gambar[]" id="syarat"
                                                    placeholder="Syarat Permohonan" required />
                                                <button type="button" class="btn btn-success" onclick="add()"><i
                                                        class="fa-sharp fa-solid fa-plus"
                                                        style="color: #ffffff;"></i></button>
                                                <button type="button" class="btn btn-danger" onclick="remove()"><i
                                                        class="fa-sharp fa-solid fa-minus"
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
                    </div>
                    <div class="row">
                        <div class="col-12 load-more">
                            <button type="submit" class="btn btn-primary color-black post-comment" style="background-color: #030f27">Kirim</button>
                        </div>
                </form>
            </div>
        </div>

        <hr class="solid mt-3" />
    </div>

    <div class="ms-4">
        @if (sizeof($replies) == 0)
            <div class="container">
                <h3>Belum ada respon apapun</h3>
            </div>
        @else
            @foreach ($replies as $data)
                <div class="container">
                    <div class="rounded-top rounded-bottom mb-4">
                        <div class="d-flex flex-row profil mb-3">
                            <img class="rounded-circle me-2" src="{{ $data->user->picture_url }}"
                                style="width: 2em; height: 2em" alt="" />
                            <p class="my-auto" style="font-size: 12px; color: #222; font-weight: 600">
                                {{ $data->user->nama }}
                            </p>
                        </div>
                        <div class="image-container">
                            @foreach ($data->forum_media as $media)
                            <img src="{{ asset('storage/forum/' . $media['nama_file']) }}" alt="Image 1" />
                        @endforeach
                        </div>
                        <p style="font-size: 14px; color: #222">
                            {{ $data->content }}
                        </p>
                    </div>
                    <hr class="solid mt-3" />
                </div>
            @endforeach
        @endif
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
