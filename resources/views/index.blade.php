<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dates</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <section class="header containerr">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.png" width="200px" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('home')}}">home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}#gallery-section">galary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('home')}}#blog-section">blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}#about-us-section">about us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('home')}}#contact-section">contact</a>
                        </li>
                        @guest
                            
                        @if (Route::has('register'))
                        <li class="nav-item sign-up">
                            <a class="nav-link" href="{{ route('register') }}">sign up</a>
                        </li>
                        @endif
                        @if (Route::has('login'))
                        <li class="nav-item ">
                            <a class="nav-link" aria-current="page" href="{{ route('login') }}">log in</a>
                        </li>
                        @endif
                        
                        @endguest
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn" type="submit"><i class="fas fa-search search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </section>


    <!-- Section Carousel Start -->

    <section class="carousel-section" id="carousel-section">
        <div class="containerr">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                        class="active carousel-item-icon" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2" class="carousel-item-icon"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3" class="carousel-item-icon"></button>
                </div>
                <div class="carousel-inner">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($sliders as $slider)
                    <div class="carousel-item @if($i == 0) active @endif" data-bs-interval="3000">
                        <img src="{{URL::asset($slider->photo)}}" class="d-block w-100" height="500px" alt="...">
                        <!-- <a href="" class="shop-now">shop now</a> -->
                        @php
                            $i++;
                        @endphp
                    </div>
                    @endforeach
                    
                    {{-- <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{asset('images/carousel-image.jpg')}}" class="d-block w-100" height="500px" alt="...">
                        <!-- <a href="" class="shop-now">shop now</a> -->
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{asset('images/carousel-image.jpg')}}" class="d-block w-100" height="500px" alt="...">
                        <!-- <a href="" class="shop-now">shop now</a> -->
                    </div> --}}
                </div>
                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
            </div>
        </div>
    </section>

    <!-- Section Carousel End -->

    <!-- Section Gallery Start -->

    <section class="gallery" id="gallery-section">
        <div class="containerr">
            <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
                <div class="col portfolio-item">
                    <p class="love-your">LOVE YOUR</p>
                    <p class="health">HEALTH...</p>
                    <p class="love">LOVE</p>
                    <p class="dates">DATES</p>
                </div>
                @foreach ($products as $product)
                <div class="col portfolio-item">
                    <a href="#">
                        <img src="{{URL::asset($product->photo)}}" class="gallery-item" alt="gallery" height="100%">
                        <div class="layer-content">
                            <div class="layer-info">
                                <span class="title">{{$product->title}}</span>
                            </div>
                        </div> <!-- ./layer-content -->
                    </a>
                </div>
                @endforeach
                {{-- <div class="col portfolio-item">
                    <a href="">
                        <img src="{{asset('img/3.jpg')}}" class="gallery-item" alt="gallery">
                        <div class="layer-content">
                            <div class="layer-info">
                                <span class="title">title</span>
                            </div>
                        </div> <!-- ./layer-content -->
                    </a>
                </div>
                <div class="col portfolio-item">
                    <a href="">
                        <img src="{{asset('img/4.jpg')}}" class="gallery-item" alt="gallery">
                        <div class="layer-content">
                            <div class="layer-info">
                                <span class="title">title</span>
                            </div>
                        </div> <!-- ./layer-content -->
                    </a>
                </div>
                <div class="col portfolio-item">
                    <a href="">
                        <img src="{{asset('img/5.jpg')}}" class="gallery-item" alt="gallery">
                        <div class="layer-content">
                            <div class="layer-info">
                                <span class="title">title</span>
                            </div>
                        </div> <!-- ./layer-content -->
                    </a>
                </div>
                <div class="col portfolio-item">
                    <a href="">
                        <img src="{{asset('img/6.jpg')}}" class="gallery-item" alt="gallery">
                        <div class="layer-content">
                            <div class="layer-info">
                                <span class="title">title</span>
                            </div>
                        </div> <!-- ./layer-content -->
                    </a>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Section Gallery End -->

    <!-- Section Blog Start -->

    <section class="blog" id="blog-section">
        <div class="containerr d-flex align-items-center justify-content-center ">
            <h3 class="blog-title">3 easy steps to feeling better</h3>
        </div>
        <div class="card-blog">
            <div class="containerr">
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="card col-md-4 m-auto" style="width: 22rem;">
                        <img src="{{URL::asset($blog->photo)}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="blog-title">{{$blog->title}}</p>
                            <p class="blog-description">{!! $blog->description !!}</p>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="card col-md-4 m-auto" style="width: 22rem;">
                        <img src="{{asset('images/blog-image.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="blog-title">feel the difference</p>
                            <p class="blog-description">feel the differencefeel the differencefeel the difference</p>
                        </div>
                    </div>
                    <div class="card col-md-4 m-auto" style="width: 22rem;">
                        <img src="{{asset('images/blog-image.png')}}" class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="blog-title">feel the difference</p>
                            <p class="blog-description">feel the differencefeel the differencefeel the difference</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Section Blog End -->

    <!-- Section Subscribe Start -->

    <section class="subscribe containerr">
        <div class=" subscribe-containerr">
            <div class="subscribe-containerr">
                <h3 class="subscribe-title">subscribe now !</h3>
                <div class="break"></div>
                <p class="subscribe-description">To receive all our
                    news, products and exclusive offers on your e-mail</p>
                <div class="break"></div>
                <form action="{{route('subscribe.store')}}" method="POST" class="subscribe-form">
                    @csrf
                    <input type="email" name="email" class="subscribe-email" placeholder="Enter email" aria-describedby="emailHelp">
                    <button type="submit" class="subscribe-submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </section>

    <!-- Section Subscribe End -->

    <!-- Section Order-now Start -->

    <section class="order-now d-flex containerr">
        <!-- <a href="" class="order-link">
            <h3 class="order-text">Order Now</h3>
        </a> -->
        <div class="div order-image">
            <img src="{{asset('images/order-now-image.png')}}" width="400px" alt="">
        </div>
    </section>

    <!-- Section Order-now End -->

    <!-- Section Technical Supportus Start -->

    <section class="technical-support" id="about-us-section">
        <h4 class="technical-support-title">still have questions</h4>
        <p class="technical-support-description">our care team is ready and waiting to hear form you</p>
        <div class="technical-support-content">
            <span><i class="fas fa-mobile-alt"></i> +966 11 27 44 44 9</span>
            <span class="technical-support-or">OR</span>
            <span><i class="fas fa-envelope"></i> info@ideadvert.com</span>
        </div>
    </section>

    <!-- Section Technical Support Start -->

    <!-- Contact-us Start -->

    <section class="contact-us" id="contact-section">
        <h4 class="contact-us-title">Connect with us</h4>
        <ul class="social-media-links">
            <li><a href=""><i class="fab fa-youtube"></i></a></li>
            <li><a href=""><i class="fab fa-instagram"></i></a></li>
            <li><a href=""><i class="fab fa-twitter"></i></a></li>
            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
        </ul>
    </section>

    <!-- Contact-us Start -->


    <!-- <script>
        var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: false
        })
    </script> -->

    <script src="{{asset('js/jquery.min.js')}}"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    
    
    //         document.onkeydown = function (e) {
    //         return false;
    // }
        document.onkeydown = function(e) {
          if(event.keyCode == 123) {
            return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
          }
          if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
          }
          
        }
        
        </script>


</body>

</html>