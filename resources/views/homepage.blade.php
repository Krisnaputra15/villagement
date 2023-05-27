@extends('template.template')

@section('content')
<div class="wow fadeUp">       
    <div class="portfolio">
        <div class="container">
            <div class="section-header text-center">
                <h2>Jenis Surat</h2>
                <p>Jenis Pelayanan Administrasi Yang Dapat Dilayani</p>
            </div>
            @if(sizeof($layanan) == 0)
            <h4 class="text-center my-auto text-black pt-4 pb-5">Mohon maaf, semua layanan pembuatan surat masih dalam masa pengembangan</h4>
            @else
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-warp">
                        <div class="portfolio-img">
                            <div class="portfolio-overlay">
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non. Aliqu metus tortor, auctor id gravi condime, viverra quis sem.
                                </p>
                            </div>
                        </div>
                        <div class="portfolio-text flex-row justify-content-between">
                            <h6 class="text-center my-auto text-white px-3">Surat Keterangan Pengantar</h6>
                            <a class="btn" href="img/portfolio-1.jpg" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif   
            <div class="row">
                <div class="col-12 load-more pt-4 mb-5">
                    <a class="btn" href="#">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio" style="width: 100%; background-color: #030f27;">
        <div class="py-4">
            <div class="container" >
                <div class="section-header text-center">
                    <h2 style="color:aliceblue">Forum Diskusi</h2>
                    <p>Pengaduan Keluhan Sarana dan Prasarana</p>
                </div>
                @if(sizeof($forum) == 0)
                <h4 class="text-center my-auto text-white pt-4 pb-5">Belum ada diskusi yang dibuat</h4>
                @else
                <a href="">
                    <div class="rounded-top rounded-bottom p-3 mb-4 border-smoke" style="background-color: aliceblue;">
                        <h5 style="color:#030f27">Judul</h5>
                        <p style="color:rgb(0, 0, 0)">lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
                        <div class="d-flex flex-row" style="font-size: small;">
                            <p class="me-5" >Views 0</p>
                            <p class="mx-5">Votes 0</p>
                        </div>
                    </div>
                </a>
                @endif   
                <div class="row">
                    <div class="col-12 load-more pt-4 mb-5">
                        <a class="btn" href="#">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection