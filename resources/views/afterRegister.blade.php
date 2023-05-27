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
                @csrf
                <div class="text-center mt-4">
                    <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection