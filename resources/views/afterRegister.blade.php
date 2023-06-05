@extends('template.template')

@section('content')
    <div class="wow fadeUp">            
        <div class="container mt-4" style="width: 80%">
            <div class="text-center">
                <h2 class="text-center">Formulir Data Diri</h2>
                <p> Mohon isi data diri berikut terlebih dahulu </p>
            </div>
            
            <form action="{{url('user/fillform/submit')}}" method="POST">
                <div>
                    <label for="" class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{$data->nik}}" maxlength="16" required>
                </div>
                <div>
                    <label for="" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
                </div>
                <div>
                    <label for="" class="form-label">Dusun</label>
                    <input type="text" name="dusun" class="form-control" value="{{$data->dusun}}" required>
                </div>
                <div id="form-container">
                    <label for="" class="form-label">RT</label>
                    <input type="number" name="rt" class="form-control" value="{{$data->rt}}" maxlength="2" required>
                </div>
                <div id="form-container">
                    <label for="" class="form-label">RW</label>
                    <input type="number" name="rw" class="form-control" value="{{$data->rw}}" maxlength="2" required>
                </div>
                 <div class="mb-3">
                                    <label for="rw" class="form-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Tempat Lahir" value="{{ $data->tempat_lahir }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" id="tanggal_lahir"
                                        name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $data->tanggal_lahir }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select" required>
                                        @if ($data->jenis_kelamin == 'L')
                                            <option value="L" selected>Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        @else
                                            <option value="L">Laki - Laki</option>
                                            <option value="P" selected>Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Desa</label>
                                    <input class="form-control" type="text" id="desa"
                                        name="desa" placeholder="Nama Desa" value="{{ $data->desa }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Kecamatan</label>
                                    <input class="form-control" type="text" id="kecamatan"
                                        name="kecamatan" placeholder="Nama Kecamatan" value="{{ $data->kecamatan }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Agama</label>
                                    <input class="form-control" type="text" id="agama"
                                        name="agama" placeholder="Nama Agama" value="{{ $data->agama }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Status Perkawinan</label>
                                    <select id="status" name="status_kawin" class="select2 form-select" required>
                                        @if ($data->status_kawin == 'belum')
                                            <option value="belum" selected>Belum Kawin</option>
                                            <option value="pernah">Pernah Kawin</option>
                                            <option value="kawin">Kawin</option>
                                        @elseif($data->status_kawin == 'pernah')
                                            <option value="belum">Belum Kawin</option>
                                            <option value="pernah" selected>Pernah Kawin</option>
                                            <option value="kawin">Kawin</option>
                                        @else
                                            <option value="belum">Belum Kawin</option>
                                            <option value="pernah">Pernah Kawin</option>
                                            <option value="kawin" selected>Kawin</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Kewarganegaraan</label>
                                    <input class="form-control" type="text" id="kewarganegaraan"
                                        name="kewarganegaraan" placeholder="Nama Kewarganegaraan" value="{{ $data->kewarganegaraan }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Pekerjaan</label>
                                    <input class="form-control" type="text" id="pekerjaan"
                                        name="pekerjaan" placeholder="Nama pekerjaan" value="{{ $data->pekerjaan }}" />
                                </div>
                @csrf
                <div class="text-center mt-4">
                    <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection