@extends('layouts.new')

@section('content')
<!-- home section starts -->

<section class="home" id="home" style="margin-top: 20px">

    <div class="content">
        <span> Stay Healthy, Stay Alive </span>
        <h3> iMoLab </h3>
        <p>
            iMoLab berupaya menyediakan pendaftaran dan penerimaan 
            hasil tes laboratorium, serta konsultasi, yang dapat 
            diakses dengan mudah secara online melalui website.
        </p>
        <a href="#" class="btn">order now</a>
    </div>
    <div class="image">
        <img src="{{ asset('frontend/image/hellaw.png') }}" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- product section starts -->

<section class="product" id="product">
    
    <!-- tes swiper start -->
    <div class="slide-container swiper" id="tes">
        <h3 class="sub-heading"> Cek tes paling populer disini </h3>
        <h1 class="heading"> Tes Paling Populer </h1>
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                @foreach ($tests as $item)
                <div class="card swiper-slide">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <div class="image">
                        <img src="data:image/png;base64,{{ $item->foto }}" alt="">
                    </div>
                    <div class="content">
                        {{-- <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div> --}}
                        <h3> {{ $item->nama_produk }} </h3>
                        <span class="price">Rp. {{ format_uang($item->harga) }}</span><br>
                        <a href="#" class="btn"> + Keranjang </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- tes swiper ends -->

    <!-- panel swiper starts -->
    <div class="slide-container swiper" id="panel">
        <h3 class="sub-heading"> Cek panel paling populer disini </h3>
        <h1 class="heading"> Panel Paling Populer </h1>
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                @foreach ($panels as $item)
                <div class="card swiper-slide">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <div class="image">
                        <img src="data:image/png;base64,{{ $item->foto }}" alt="">
                    </div>
                    <div class="content">
                        {{-- <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div> --}}
                        <h3> {{ $item->nama_produk }} </h3>
                        <span class="price">Rp. {{ format_uang($item->harga) }}</span><br>
                        <a href="#" class="btn"> + Keranjang </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- panel swiper ends -->

</section>

<!-- product section ends -->

<!-- about section starts -->

<section class="about" id="about">
    
    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="{{ asset('frontend/image/logo1.png') }}" alt="">
        </div>
        <div class="content">
            <h3> Best medical laboratory in Indonesia </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil! </p>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus. </p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-stopwatch"></i>
                    <span> fast process </span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span> easy payment </span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span> customer service 24/7 </span>
                </div>
            </div>
            <a href="#" class="btn"> learn more </a>
        </div>

    </div>

</section>
@endsection