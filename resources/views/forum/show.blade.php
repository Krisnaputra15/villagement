@extends('template.template')

@section('content')
    <div class="single p-0">
        <div class="container pt-5 pb-3">
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
            <div class="rounded-top rounded-bottom mb-4">
                <div class="d-flex justify-content-between">
                    <h5 style="color: #030f27; font-size: 20px">{{ $data->judul }}</h5>
                    @if (auth()->user()->id == $data->user->id)
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                data-bs-target="#detail">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('forum/' . $data->id) . '/hapus' }}">Hapus Forum</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="d-flex flex-row profil mb-3">
                    <img class="rounded-circle me-2" src="{{ $data->user->picture_url }}" style="width: 2em; height: 2em"
                        alt="" />
                    <p class="my-auto" style="font-size: 12px">Ditulis oleh {{ $data->user->nama }}</p>
                </div>
                @if (sizeof($data->forum_media) != 0)
                    <div class="image-container">
                        @foreach ($data->forum_media as $media)
                            <img src="{{ asset('storage/forum/' . $media['nama_file']) }}" alt="Image 1" />
                        @endforeach
                    </div>
                @endif
                <p style="color: #222; font-size: 14px; margin: 2em 0 2em 0">
                    {{ $data->content }}
                </p>
                <div class="pb-3 d-flex flex-row">
                    <a href="{{ url('forum/' . $data->id . '/upvote') }}" class="ms-2 me-4"><i
                            class="fa-regular fa-thumbs-up"></i></a>
                </div>
                <hr class="solid my-1" />
                <div class="d-flex flex-row justify-content-between pt-3" style="font-size: small">
                    <div class=d-flex>
                        <p class="ms-2"><b>{{ $data->view_count }}</b> Views</p>
                        <p class="ms-4"><b>{{ $data->upvote_count }}</b> Votes</p>
                    </div>
                    @php $date = new DateTime($data->created_at) @endphp
                    <p style="font-size: 12px; color: #807d7d!important;">Dibuat pada {{ $date->format('d-m-Y') }}</p>
                </div>
                <hr class="solid my-1" />
            </div>
        </div>
        <div class="container">
            <div class="d-flex">
                <img class="rounded-circle" src="{{ $data->user->picture_url }}" style="width: 2em; height: 2em"
                    alt="" />
                <form action="{{ url('forum/' . $data->id . '/comment') }}" method="POST" class="ms-3 d-flex gap-2"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex flex-column gap-2">
                        <textarea style=" resize: none; width: 750px; height: 10em; padding: 8px 8px; border: none; font-size: 14px; "
                            name="deskripsi" id="" placeholder="Tulis respon anda"></textarea>
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
                                                    <input class="form-control" type="file" name="gambar[]"
                                                        id="syarat" placeholder="Syarat Permohonan" />
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
                            @if ($data->is_ditutup == 0)
                                <button type="submit" class="btn btn-primary color-black post-comment"
                                    style="background-color: #030f27">Kirim</button>
                            @else
                                <button type="submit" class="btn btn-primary color-black post-comment"
                                    style="background-color: #030f27" disabled>Kirim</button>
                            @endif
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
                        <div class="d-flex flex-row profil mb-3 justify-content-between">
                            <div class="d-flex">
                                @if ($data->user->level == 1)
                                <svg width="20" viewBox="0 0 25 42" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    class="me-2">
                                    <defs>
                                        <path
                                            d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                            id="path-1"></path>
                                        <path
                                            d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                            id="path-3"></path>
                                        <path
                                            d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                            id="path-4"></path>
                                        <path
                                            d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                            id="path-5"></path>
                                    </defs>
                                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd">
                                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                    <mask id="mask-2" fill="white">
                                                        <use xlink:href="#path-1"></use>
                                                    </mask>
                                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                                    <g id="Path-3" mask="url(#mask-2)">
                                                        <use fill="#696cff" xlink:href="#path-3"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3">
                                                        </use>
                                                    </g>
                                                    <g id="Path-4" mask="url(#mask-2)">
                                                        <use fill="#696cff" xlink:href="#path-4"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4">
                                                        </use>
                                                    </g>
                                                </g>
                                                <g id="Triangle"
                                                    transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                    <use fill="#696cff" xlink:href="#path-5"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            @else
                                <img class="rounded-circle me-2" src="{{ $data->user->picture_url }}"
                                    style="width: 2em; height: 2em" alt="" />
                            @endif
                            <p class="my-auto" style="font-size: 12px; color: #222; font-weight: 600">
                                {{ $data->user->level == 1 ? 'Villagement - ' . $data->user->nama . ' ' : $data->user->nama }}
                                @if ($data->user->level == 1)
                                    <img src="{{ asset('img/verified.png') }}" style="width: 2em" alt="">
                                @endif
                            </p>
                            </div>
                            @if (auth()->user()->id == $data->user->id)
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                            data-bs-target="#detail">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('forum/' . $data->id) . '/hapus' }}">Hapus Forum</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                        </div>
                        <div class="image-container">
                            @foreach ($data->forum_media as $media)
                                <img src="{{ asset('storage/forum/' . $media['nama_file']) }}" alt="Image 1" />
                            @endforeach
                        </div>
                        <p style="font-size: 14px; color: #222">
                            {{ $data->content }}
                        </p>
                        @php $date = new DateTime($data->created_at) @endphp
                        <p class="text-end" style="font-size: 12px; color: #807d7d!important;">Dibuat pada
                            {{ $date->format('d-m-Y') }}</p>
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
