@extends('template.template')

@section('content')
    <div class="wow fadeUp">
        <div class="portfolio">
            <div class="section-header text-center">
                <h2>FAQs</h2>
                <p>Pertanyaan yang sering ditanyakan oleh warga</p>
            </div>
            @if (sizeof($data) == 0)
                <h4 class="text-center my-auto text-black pt-4 pb-5">Mohon maaf, semua layanan pembuatan surat masih dalam
                    masa pengembangan</h4>
            @else
                <div class="container">
                    <div class="row">
                            <div class="">
                                <div id="accordion-1">
                                    @php $i = 1 @endphp
                                    @foreach($data as $item)
                                        @if($item->is_active == 1)
                                            <div class="card wow fadeInLeft mb-3" data-wow-delay="0.1s">
                                                <div class="card-header">
                                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{$i}}">
                                                        {{$item->pertanyaan}}
                                                    </a>
                                                </div>
                                                <div id="collapse{{$i}}" class="collapse" data-parent="#accordion-1">
                                                    <div class="card-body">
                                                        {{$item->jawaban}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @php ++$i @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12 load-more pt-4 mb-5">
                    <a class="btn" href="{{ url('/') }}">Kembali Ke Homepage</a>
                </div>
            </div>
        </div>

    </div>
@endsection
