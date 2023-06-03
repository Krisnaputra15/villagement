@extends('template.template')

@section('content')
<div class="portfolio wow fadeUp">
    <div class="container">
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
        <div class="section-header text-center">
            <h2>Jenis Surat</h2>
            <p>Jenis Pelayanan Administrasi Yang Dapat Dilayani</p>
        </div>
        @if(sizeof($layanan) == 0)
        <h4 class="text-center my-auto text-black pt-4 pb-5">Mohon maaf, semua layanan pembuatan surat masih dalam masa pengembangan</h4>
        @else
        <div class="row portfolio-container">
            @foreach($layanan as $l)
            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-warp">
                    <div class="portfolio-img">
                        <div class="portfolio-overlay">
                            <p>
                                {{$l->deskripsi}}
                            </p>
                        </div>
                    </div>
                    <div class="portfolio-text flex-row justify-content-between">
                        <a href="{{url('layanan/'.$l->id)}}"><h6 class="text-center my-auto text-white px-3">{{$l->nama_layanan}}</h6></a>
                        <a class="btn" href="{{url('layanan/'.$l->id)}}" data-lightbox="portfolio">+</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif   
        <div class="row">
            <div class="col-12 load-more pt-4 mb-5">
                <a class="btn" href="{{url('/')}}">Kembali Ke Homepage</a>
            </div>
        </div>
    </div>
</div>
@endsection