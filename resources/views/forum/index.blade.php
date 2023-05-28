@extends('template.template')

@section('content')
<div class="d-flex flex-row container  " style="width: 1500px;">

    <div class="border-box container p-4 m-3 " style="border-radius: 20px;width: 70%;">
        <h2>Forum  Sarana Prasarana</h2>
        <div class="d-flex p-3 mt-3">
            <img class="rounded-circle" src="img/team-2.jpg" style="width: 2em; height: 2em;" alt="">
            <div class="d-flex flex-column" >
                <form action="" class="ml-3">
                    <input class="" style="border-radius: 30px; resize: none; width: 90%; height: 3em; padding: 8px 12px; border:1px solid #999; font-size: 14px;" name="" id="" placeholder="Judul">
                    <textarea class="mt-3" style="resize: none; width: 90%; height: 10em; padding: 8px 12px; font-size: 14px; border-radius: 20px; border: 1px solid #999;" name="" id="" placeholder="Tulis keluhan Anda"></textarea>
                    <div class="text-center d-flex mt-3" style="gap: 24em;">
                        <div class="d-flex flex-row my-auto" style="gap: 1em; color: #030f27;">
                            <i class="fa-solid fa-image form-btn"></i>
                            <i class="fa-solid fa-upload form-btn"></i>
                        </div>
                        <button class="btn" type="submit" href="#" style="background-color: #030f27; color: white;">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

    <div class="border-box py-4 m-3" style="border-radius: 20px; width: 30%;">
        <!-- <form action="" method="get" class="d-flex" style="border-radius: 20px;" >
            <input type="text" class="px-2 py-1" name="" id="" style="box-sizing: border-box; width: 95%; border: 1px solid; border-right: none;">
            <button style="border: 1px solid;border-left: none; background: none;" type="submit">
                <i class="fa-solid fa-search"></i>
            </button>
        </form> -->

        <h5 class="px-3">Sedang Populer</h5>
        <a href="">
            <div class="contents px-3 py-3">
                <p>#1 Perbaikan jalan desa</p>
                <div class="d-flex flex-row" style="font-size: small;">
                    <p class="ml-2 mb-0" ><b>0</b> Views</p>
                    <p class="ml-4 mb-0"><b>0</b> Votes</p>
                </div>
            </div>
        </a>

        <a href="">
            <div class="contents px-3 py-3">
                <p>#1 Perbaikan jalan desa</p>
                <div class="d-flex flex-row" style="font-size: small;">
                    <p class="ml-2 mb-0" ><b>0</b> Views</p>
                    <p class="ml-4 mb-0"><b>0</b> Votes</p>
                </div>
            </div>
        </a>

        <a href="">
            <div class="contents px-3 py-3">
                <p>#1 Perbaikan jalan desa</p>
                <div class="d-flex flex-row" style="font-size: small;">
                    <p class="ml-2 mb-0" ><b>0</b> Views</p>
                    <p class="ml-4 mb-0"><b>0</b> Votes</p>
                </div>
            </div>
        </a>
        
    </div>
</div>
@endsection