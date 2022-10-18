<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsoneMart</title>
    <link rel="stylesheet" href="{{ asset('asonemart/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asonemart/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('asonemart/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asonemart/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asonemart/css/imagehover.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;700&display=swap" rel="stylesheet">
    @livewireStyles
<style>
    body{
        font-family: 'Rubik', sans-serif;
        font-weight: 300;
        font-size:14px;
    }
</style>
</head>
<body>
    <header class="asonemart-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="col-md-4 navbar-brand mr-0" href="#">
                    <img src="{{asset('asonemart/images/asonemart_logo.png')}}" class="d-block" width="168.5px" height="65.5px" alt="AsoneMart Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="hvr-shutter-out-horizontal nav-link" href="#">Shipping <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="hvr-shutter-out-horizontal nav-link" href="#">Customer Care </a>
                        </li>
                        <li class="nav-item">
                            <a class="hvr-shutter-out-horizontal nav-link" href="#">Sell On ASone Mart </a>
                        </li>
                        <li class="nav-item">
                            <a class="hvr-shutter-out-horizontal nav-link" href="#">How to Buy</a>
                        </li>
                        <li class="nav-item">
                            <a class="hvr-shutter-out-horizontal nav-link" href="#">Login</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex ml-auto nav-cart">
                    <ul class="mb-0">
                        <li><a class="nav-link" href="#"><i class="bi bi-basket3-fill"></i></a></li>
                        <li><a class="nav-link" href="#"><i class="bi bi-heart-fill"></i></a></li>
                    </ul>
                    
                </div>
            </nav>
        </div>
    </header><!-- .asonemart-header -->
    <section class="asonemart-banner">
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-md-4 pr-0">
                    <div class="categories-menu-sidebar min-height">
                        <h2 class="list-group-header">CATEGORIES</h2>
                        <ul class="list-group list-group-flush py-2 px-4">
                            <li class="list-group-item d-flex">Back To School <i class="fas fa-chevron-right ml-auto"></i></li>
                            <li class="list-group-item  d-flex">Gift Center<i class="fas fa-chevron-right ml-auto"></i></li>
                            <li class="list-group-item  d-flex">Home Warranties<i class="fas fa-chevron-right ml-auto"></i></li>
                            <li class="list-group-item  d-flex">Clothes<i class="fas fa-chevron-right ml-auto"></i></li>
                            <li class="list-group-item  d-flex">Shoes<i class="fas fa-chevron-right ml-auto"></i></li>
                            <li class="list-group-item  d-flex">Beauty<i class="fas fa-chevron-right ml-auto"></i></li>
                            <li class="list-group-item  d-flex">Home<i class="fas fa-chevron-right ml-auto"></i></li>
                        </ul><!-- .list-group -->
                    </div><!-- .categories-menu-sidebar -->
                </div>
                <div class="col-md-8 pl-0">
                    <div class="carousel-banner">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <img src="{{ asset('asonemart/images/asonemart-banner-01.png')}}" class="d-block w-100" height="374" alt="AsoneMart Banner">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('asonemart/images/asonemart-banner-02.png')}}" class="d-block w-100" height="374"  alt="AsoneMart Banner">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('asonemart/images/asonemart-banner-03.png')}}" class="d-block w-100" height="374" alt="AsoneMart Banner">
                              </div>
                            </div>
                          </div>
                    </div><!-- .carousel-banner -->
                    <div class="marquee-slide">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                            <ul class="clearfix marquee-list">
                                <li>
                                    <div class="verticle-middle">
                                        <i class="fas fa-circle mr-2"></i><a href="electronics">ELECTRONICS</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="verticle-middle">
                                        <i class="fas fa-circle mr-2"></i><a href="home_supplies">HOME SUPPLIES</a>
                                    </div>
                                <li>
                                    
                                        <i class="fas fa-circle mr-2"></i><a href="stationaries">STATIONARIES</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="verticle-middle">
                                        <i class="fas fa-circle mr-2"></i><a href="pet_supplies">PET SUPPLIES</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="verticle-middle">
                                        <i class="fas fa-circle mr-2"></i><a href="kitchen">KITCHEN</a>
                                    </div>    
                                    </li>
                            </ul>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .asonemart-banner -->
    
    @yield('content')
    <section class="asonemart-footer-img">
        <img src="{{ asset('asonemart/images/asonemart.jpg')}}" alt="Asonemart Footer" class="image-footer">
    </section>
    <footer class="asonemart-footer">
        <div class="container asonemart-footer-content">
            <div class="row py-5">
                <div class="col-md-3">
                    <h3 class="asonemart-footer-title">Customer Care</h3>
                    <ul class="footer-list-group">
                        <li class="footer-list">
                            <a href="">ASone Mart Help Center</a>
                        </li>
                        <li class="footer-list">
                            <a href="">How To Buy</a>
                        </li>
                        <li class="footer-list">
                            <a href="">Shipping & Delivery</a>
                        </li>
                        <li class="footer-list">
                            <a href="">ASone Mart Help Center</a>
                        </li>
                    </ul><!-- .footer-list -->
                </div>
                <div class="col-md-3">
                    <h3 class="asonemart-footer-title">Customer Care</h3>
                    <ul class="footer-list-group">
                        <li class="footer-list">
                            <a href="">About ASone Mart</a>
                        </li>
                        <li class="footer-list">
                            <a href="">Sell on ASone Ma</a>
                        </li>
                        <li class="footer-list">
                            <a href="">Terms and Conditions</a>
                        </li>
                        <li class="footer-list">
                            <a href="">Privacy Policy</a>
                        </li>
                        <li class="footer-list">
                            <a href="">Contact Us</a>
                        </li>
                    </ul><!-- .footer-list -->
                </div>
                <div class="col-md-2">
                    <h3 class="asonemart-footer-title">Customer Care</h3>
                    <ul class="footer-list-group">
                        <li class="footer-list float-left">
                            <a href=""><i class="fab fa-instagram fa-3x"></i></a>
                        </li>
                        <li class="footer-list pl-5">
                            <a href=""><i class="fab fa-facebook-square fa-3x"></i></a>
                        </li>
                    </ul><!-- .footer-list -->
                </div>
                <div class="col-md-4">
                    <h3 class="asonemart-footer-title">Partnership</h3>
                    <ul class="footer-list-group">
                        <li class="footer-list float-left mr-3">
                            <img src="{{asset('asonemart/images/chanel.jpg')}}" class="img-fluid" width="140" alt="Chanel">
                        </li>
                        <li class="footer-list">
                            <img src="{{asset('asonemart/images/gucci.jpg')}}" class="img-fluid" width="140" alt="Gucci">
                        </li>
                    </ul><!-- .footer-list -->
                </div>
            </div>
        </div>
    </footer><!-- .asonemart-footer -->
    
    <script src="{{ asset('asonemart/js/jquery.min.js')}}"></script>
    <script src="{{ asset('asonemart/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('asonemart/js/all.min.js')}}"></script>
    <script src="{{ asset('asonemart/js/fontawesome.min.js')}}"></script>
    @livewireScripts
</body>
</html>