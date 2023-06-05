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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Detail</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detail User</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ $user->picture_url == null ? asset('admin/img/avatars/1.png') : $user->picture_url }}"
                                alt="user-avatar" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Ganti foto baru</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST"
                            action="{{ url('/admin/users/' . $user->id . '/update') }}">
                            <div class="row">
                                @csrf
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input class="form-control" type="text" name="nik" id="nik"
                                        placeholder="NIK" value="{{ $user->nik }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="nama" id="nama"
                                        placeholder="Nama" value="{{ $user->nama }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" name="email" id="email"
                                        placeholder="Email" value="{{ $user->email }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="dusun" class="form-label">Dusun</label>
                                    <input type="text" class="form-control" id="dusun" name="dusun"
                                        placeholder="Dusun" value="{{ $user->dusun }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input class="form-control" type="number" maxlength="2" id="rt" name="rt"
                                        placeholder="Nomor RT" value="{{ $user->rt }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rt" class="form-label">RW</label>
                                    <input class="form-control" type="number" maxlength="2" id="rw" name="rw"
                                        placeholder="Nomor RT" value="{{ $user->rw }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Tempat Lahir" value="{{ $user->tempat_lahir }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" id="tanggal_lahir"
                                        name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ $user->tanggal_lahir }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="select2 form-select" required>
                                        @if ($user->jenis_kelamin == 'L')
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
                                        name="desa" placeholder="Nama Desa" value="{{ $user->desa }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Kecamatan</label>
                                    <input class="form-control" type="text" id="kecamatan"
                                        name="kecamatan" placeholder="Nama Kecamatan" value="{{ $user->kecamatan }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Agama</label>
                                    <input class="form-control" type="text" id="agama"
                                        name="agama" placeholder="Nama Agama" value="{{ $user->agama }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Status Perkawinan</label>
                                    <select id="status" name="status_kawin" class="select2 form-select" required>
                                        @if ($user->status_kawin == 'belum')
                                            <option value="belum" selected>Belum Kawin</option>
                                            <option value="pernah">Pernah Kawin</option>
                                            <option value="kawin">Kawin</option>
                                        @elseif($user->status_kawin == 'pernah')
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
                                        name="kewarganegaraan" placeholder="Nama Kewarganegaraan" value="{{ $user->kewarganegaraan }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="rw" class="form-label">Pekerjaan</label>
                                    <input class="form-control" type="text" id="pekerjaan"
                                        name="pekerjaan" placeholder="Nama pekerjaan" value="{{ $user->pekerjaan }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Otoritas</label>
                                    <select id="level" name="level" class="select2 form-select">
                                        @if ($user->level == 1)
                                            <option value="1" selected>Administrator</option>
                                            <option value="2">Warga</option>
                                        @else
                                            <option value="1">Administrator</option>
                                            <option value="2" selected>Warga</option>
                                        @endif
                                    </select>
                                </div>
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
                    <h5 class="card-header">Hapus Akun</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Apakah anda benar-benar ingin menghapus akun anda?
                                </h6>
                                <p class="mb-0">akun tidak akan bisa dikembalikan saat sudah dihapus.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" method="GET"
                            action="{{ url('/admin/users/' . $user->id . '/delete') }}">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                    id="accountActivation" required />
                                <label class="form-check-label" for="accountActivation">Saya menyetujui penghapusan akun
                                    ini</label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Hapus Akun</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
