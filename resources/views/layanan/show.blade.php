@extends('template.template')

@section('content')
    <div class="container">
       @if(session('error'))
    <div class="response error">
        <p class="text-center text-white my-auto">{{session('error')}}</p>
    </div>
    @endif
    @if(session('success'))
    <div class="response success">
        <p class="text-center text-white my-auto">{{session('success')}}</p>
    </div>
    @endif
        <div class="d-flex">
            <div class="border-box container p-4 m-3 " style="border-radius: 20px;width: 70%;">
                <h2>{{ $layanan->nama_layanan }}</h2>
                <p style="text-align: justify;">
                    {{ strlen($layanan->deskripsi) == 0 ? 'Tidak ada deskripsi untuk layanan ini' : $layanan->deskripsi }}
                </p>
            </div>
            <div class="m-3" style=" width: 30%;">

                <div class="border-box py-4 " style="border-radius: 20px;">
                    <h5 class="px-3 mb-4">Syarat & Ketentuan</h5>
                    @foreach ($syarat as $s)
                        <div class="box py-2">
                            <div class="d-flex flex-row px-3 gap-2" style="color: #030f27;">
                                <i class="fa-solid fa-check-circle mr-2"></i>
                                <p class="my-auto" style="font-size: 14px;">{{ $s }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <a class="btn mt-4" 
                        style="background-color: #030f27; color: white ; width: 90%; height: 40px;" href="#"
                        @if($layanan->is_active == 1)
                        data-bs-toggle="modal" data-bs-target="#buatPengajuanModal"
                        @endif
                        >{{$layanan->is_active == 1 ? 'Buat Surat' : 'Layanan Tidak Aktif'}} </a>
                </div>
            </div>
        </div>
        <div div class="modal fade" id="buatPengajuanModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex flex-column">
                        <div class="d-flex w-100 justify-content-between">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Persyaratan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <p class="mt-2 mb-0">Anda harus mengupload persyaratan yang dibutuhkan terlebih dahulu</p>
                    </div>
                    <div class="modal-body">
                        <form id="formAccountSettings" method="POST"
                            action="{{ url('layanan/' . $layanan->id . '/buatpengajuan') }}" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="mb-3" id="syaratBox">
                                    <label for="syarat" class="form-label">Persyaratan</label>
                                    @foreach ($syarat as $s)
                                    <div class="d-flex" style="gap: 15px">
                                        <input class="form-control mb-3" type="file" name="syarat[]" id="syarat"
                                            placeholder="Syarat Permohonan" required />
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Buat Permohonan</button>
                        </form>
                    </div>
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
            <input class="form-control" type="file" name="syarat[]" placeholder="Syarat Permohonan" />
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
