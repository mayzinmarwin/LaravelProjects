
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ecommerce</title>
    <link href="{{ asset('ecommerce/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('ecommerce/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('ecommerce/css/elegant-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('ecommerce/css/nice-select.css') }}" rel="stylesheet" />
    <link href="{{ asset('ecommerce/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('ecommerce/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('ecommerce/css/slicknav.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('ecommerce/css/style.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    @yield('styles')
    <style>
        body{
            font-family: 'Rubik', sans-serif;
            font-weight: 300;
            font-size:14px;
        }
    </style>
</head>
<body>
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ url('/homepage');}}">Ecommerce</a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span> 150000</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('ecommerce/images/language.png')}}" alt="Language">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ url('/homepage');}}">Home</a></li>
                <li><a href="{{ url('/shoppage');}}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                        <li><a href="/shopping_cart">Shoping Cart</a></li>
                        <li><a href="/checkout">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> contact@asonemart.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>{{-- .humber__menu__wrapper --}}
    <header class="header asonemart_header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> contacts@asonemart.com</li>
                                <li>Free Shipping for all Order of 100000 Kyat</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{asset('ecommerce/images/language.png')}}" alt="language">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/homepage');}}"><img class="d-block" width="168.5px" height="65.5px" src="{{asset('ecommerce/images/asonemart_logo.png')}}" alt="Asonemart Logo"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ url('/homepage');}}">Home</a></li>
                            <li><a href="{{ url('/shoppage');}}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ url('/shopdetails');}}">Shop Details</a></li>
                                    <li><a href="{{ url('/shopping_cart');}}">Shoping Cart</a></li>
                                    <li><a href="{{ url('/checkout');}}">Check Out</a></li>
                                    <li><a href="{{ url('/blogdetails');}}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/blogdetails');}}">Blog</a></li>
                            <li><a href="{{ url('/contact');}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>150000</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>{{-- .asonemart_header --}}
    
    
    @include('websites.menu.sidebar')
    @yield("content")
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html">Ecommerce</a>
                        </div>
                        <ul>
                            <li>
                                18 Zarni St, Yangon 
                            </li>
                            <li>Phone: (+95) 9 4480 13922, 9 975 6300 75</li>
                            <li>Email:  contacts@ecommerce.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Ecommerce</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment">Payment</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
    @yield('scripts')
    <script src="ecommerce/js/jquery-3.3.1.min.js"></script>
    <script src="ecommerce/js/bootstrap.min.js"></script>
    <script src="ecommerce/js/jquery.nice-select.min.js"></script>
    <script src="ecommerce/js/jquery-ui.min.js"></script>
    <script src="ecommerce/js/jquery.slicknav.js"></script>
    <script src="ecommerce/js/mixitup.min.js"></script>
    <script src="ecommerce/js/owl.carousel.min.js"></script>
    <script src="ecommerce/js/main.js"></script>
</html>