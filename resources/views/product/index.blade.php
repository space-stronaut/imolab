<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iMoLab</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
        <!-- custom css file link -->
        <link rel="stylesheet" href="{{ asset('frontend/css/TesPanel.css') }}">

    </head>
    <body>

        <!-- header section starts -->

        <header class="header">

            <a href="/" class="logo"><i class="fas-fa-utensils"></i>iMoLab.</a>
                
            <nav class="navbar">
                <a href="/">Home</a>
                <a href="{{ route('tes.index') }}">Tes</a>
                <a href="{{ route('panel.index') }}">Panel</a>
                @auth
                <a href="{{ route('transaction.index') }}">History Pembelanjaan</a>
                
                @endauth
                {{-- <a href="#dokter">Dokter</a> --}}
                @auth
                        {{-- <li class="nav-item dropdown"> --}}
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Halo, <span class="text-bold text-uppercase">{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="margin-left: 300px">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        {{-- </li> --}}
                        @else
                        <a class="active" href="{{ route('login') }}">Log In</a>
                <a class="active ms-2" href="{{ route('register') }}">Sign Up</a>
                        @endauth
                
            </nav>


            <div class="icons">
                <i class="fas fa-bars" id="menu-bars"></i>
                {{-- <i class="fas fa-search" id="search-icon"></i> --}}
                {{-- <a href="#" class="fas fa-heart"></a> --}}
                @auth
                <a href="{{ route('cart.index') }}" class="fas fa-shopping-cart"></a>
                <a href="{{ route('profile.index') }}" class="fas fa-user"></a>
                @endauth
                
            </div>

        </header>

        <!-- header section ends -->

        <!-- search form -->


        <form action="" id="search-form">
            <input type="search" placeholder="search here . . ." name="" id="search-box">
            <label for="search-box" class="fas fa-search"></label>
            <i class="fas fa-times" id="close"></i>
        </form>

        <div class="container" style="margin-top: 200px">
            <div class="list">
                {{-- Halo --}}
                @foreach ($products as $item)
                <div class="item">
                    <img src="data:image/png;base64,{{ $item->foto }}" alt="">
                    <div class="title">{{ $item->nama_produk }}</div>
                    <div class="price">Rp. {{ format_uang($item->harga) }}</div>
                    <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group mb-2">
                            <input type="number" name="qty" placeholder="Quantity" id="" value="1" min="1" required style="font-size: 25px" class="form-control">

                          </div>
                        <button type="submit">+ Keranjang</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card">
            <h1>Cart</h1>
            <ul class="listCard">
            </ul>
            <div class="checkOut">
                <div class="total">0</div>
                <div class="closeShopping">Close</div>
            </div>
        </div>

        <!-- footer section starts -->

        <footer class="footer" id="footer">

            <div class="box-container">
                
                <div class="image">
                    <img src="{{ asset('frontend/image/logo1.png') }}" alt="">
                </div>

                <div class="box">
                    <a href="#"> Tentang iMoLab </a>
                    <a href="#"> Cara Pendaftaran Tes </a>
                    <a href="#"> Tes Populer </a>
                    <a href="#"> Panel Populer </a>
                </div>

                <div class="box">
                    <a href="#"> FAQ </a>
                    <a href="#"> Help Center </a>
                    <a href="#"> Karir </a>
                    <a href="#"> Syarat dan Ketentuan </a>
                </div>

                <div class="box">
                    <h3> hubungi kami </h3>
                    <a href="#"> +62 821 1163 3000 </a>
                    <a href="#"> imolab.official@gmail.com </a>
                    <a href="#"> Jalan Kemana Saja No.00, Kota Apapun, 6666 </a>
                    <a href="#"> Jawa Timur, Indonesia </a>
                </div>

            </div>

            <div class="credit"> <span>@iMoLab</span> All Rights Reserved, 2023 </div>

        </footer>

        <!-- footer section ends -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        {{-- <script src="{{ asset('frontend/js/Tes.js') }}"></script> --}}
    </body>
</html>