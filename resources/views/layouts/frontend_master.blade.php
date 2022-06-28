
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - Home One</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.7 css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('fronend') }}/assets/css/responsive.css">
    <!-- modernizr css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="{{ asset('fronend') }}/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
    <!--Start Preloader-->
    {{-- <div class="preloader-wrap">
        <div class="spinner"></div>
    </div> --}}
    <!-- search-form here -->
    <div class="search-area flex-style">
        <span class="closebar">Close</span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-12">
                    <div class="search-form">
                        <form action="http://themepresss.com/tf/html/tohoney/search">
                            <input type="text" placeholder="Search Here...">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search-form here -->
    <!-- header-area start -->
    <header class="header-area">
        <div class="header-top bg-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <ul class="d-flex header-contact">
                            <li><i class="fa fa-phone"></i> +01 123 456 789</li>
                            <li><i class="fa fa-envelope"></i> youremail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul class="d-flex account_login-area">
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('customer.login') }}"> Login/Register </a></li>
                            <li>
                                <a href="javascript:void(0);"> USD <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style right">
                                    <li><a href="javascript:void(0);">GBP</a></li>
                                    <li><a href="javascript:void(0);">AUD </a></li>
                                    <li><a href="javascript:void(0);">CAD </a></li>
                                    <li><a href="javascript:void(0);">CHF </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                        <div class="logo">
                            <a href="index.html">
                        <img src="{{ asset('fronend') }}/assets/images/logo.png" alt="">
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <nav class="mainmenu">
                            <ul class="d-flex">
                                <li class="active">
                                    <a href="{{ url('/') }}">Home <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="index.html">Home Main</a></li>
                                        <li><a href="index2.html">Home Two</a></li>
                                        <li><a href="index3.html">Home Three</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li>
                                    <a href="{{ url('shop') }}">Shop {{ total_valu_count() }}<i class="fa fa-angle-down"></i></a>
                                   
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_style">
                                        <li><a href="blog.html">blog Page</a></li>
                                        <li><a href="blog-details.html">blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('contuck') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                        <ul class="search-cart-wrapper d-flex">
                            <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-like"></i> <span>{{ Wishlist_count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                      @php
                                          $sub_total=0;
                                      @endphp
                                    @foreach ( Wishlist_item() as $Wish_item )
                                        <li class="cart-items">
                                        <div class="cart-img">
                                            <img width="50px" height="50px" src="{{ asset('uploads/product') }}/{{  $Wish_item->Wishlist_to_product->image }}" alt="" >
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">{{ $Wish_item->Wishlist_to_product->product_name }}</a>
                                            <span>QTY :{{ $Wish_item->product_quantity }}</span>
                                            <p>${{ $Wish_item->Wishlist_to_product->price }}</p>
                                            <a href="{{ route('wishlist.remove',$Wish_item->id) }}"><i class="fa fa-times"></i></a>
                                            @php
                                                $sub_total += $Wish_item->product_quantity * $Wish_item->Wishlist_to_product->price;
                                            @endphp
                                        </div>
                                    </li>
                                   
                                    @endforeach
                                    <
                                    <li>Subtotol: <span class="pull-right">${{ $sub_total }}</span></li>
                                    <li>
                                        <a href="{{ route('wishlist.page.show') }}" class="btn btn-dark text-light btn-sm">Goto Cart page</a>
                                    
    
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="flaticon-shop"></i> <span>{{ Cart_count() }}</span></a>
                                <ul class="cart-wrap dropdown_style">
                                    @php
                                        $sub_total=0
                                    @endphp
                                    @foreach (cart_item() as $item )
                                         <li class="cart-items">
                                        <div class="cart-img">
                                            {{-- {{ $item->Cart_RiletionTo_Product }} --}}
                                            <img width="50px" height="50px" src="{{ asset('uploads/product') }}/{{  $item->Cart_RiletionTo_Product->image }}" alt="" >
                                        </div>
                                        <div class="cart-content">
                                            <a href="cart.html">{{ $item->Cart_RiletionTo_Product->product_name }}</a>
                                            <span>QTY : {{ $item->product_quantity }}</span>
                                            <p>{{ $item->product_quantity * $item->Cart_RiletionTo_Product->price}}</p>
                                          
                                            @php
                                                $sub_total= $sub_total + ($item->product_quantity * $item->Cart_RiletionTo_Product->price)
                                            @endphp
                                            <a href="{{ route('remove.product.cart',$item->id) }}"><i class="fa fa-times"></i></a>
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                  
                                    <li>Subtotol: <span class="pull-right"> ${{ $sub_total }}</span></li>
                                    <li>
                                        <a href="{{ route('cart.page.show') }} " class="btn btn-dark text-light btn-sm">Goto Cart page</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                        <div class="responsive-menu-tigger">
                            <a href="javascript:void(0);">
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
            <div class="responsive-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-block d-lg-none">
                            <ul class="metismenu">
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Home</a>
                                    <ul aria-expanded="false">
                                        <li><a href="index.html">Home Main</a></li>
                                        <li><a href="index2.html">Home Two</a></li>
                                        <li><a href="index3.html">Home Three</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                    <ul aria-expanded="false">
                                        <li><a href="shop.html">Shop Page</a></li>
                                        <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="{{ route('wishlist.page.show') }}">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                    <ul aria-expanded="false">
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="single-product.html">Product Details</a></li>
                                        <li><a href="cart.html">Shopping cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </li>
                                <li class="sidemenu-items">
                                    <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                    <ul aria-expanded="false">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive-menu area start -->
        </div>
    </header>

    @yield('frontend_app')


    <section class="social-newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter text-center">
                        <h3>Subscribe  Newsletter</h3>
                        <div class="newsletter-form">
                            <form action="{{ url('subscription') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email Address...">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-item">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="footer-top-text text-center">
                                <ul>
                                    <li><a href="{{ url('/') }}">home</a></li>
                                    <li><a href="#">our story</a></li>
                                    <li><a href="#">feed shop</a></li>
                                    <li><a href="blog.html">how to eat blog</a></li>
                                    <li><a href="{{ url('contuck') }}">contt</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="footer-icon">
                            <ul class="d-flex">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-12">
                        <div class="footer-content">
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure righteous indignation and dislike</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 col-sm-12">
                        <div class="footer-adress">
                            <ul>
                                <li><a href="#"><span>Email:</span> domain@gmail.com</a></li>
                                <li><a href="#"><span>Tel:</span> 0131234567</a></li>
                                <li><a href="#"><span>Adress:</span> 52 Web Bangale , Adress line2 , ip:3105</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="footer-reserved">
                            <ul>
                                <li>Copyright © 2019 Tohoney All rights reserved.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer-area end -->
    <!-- Modal area start -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex">
                    <div class="product-single-img w-50">
                        <img src="{{asset('fronend')}}/assets/images/product/product-details.jpg" alt="">
                    </div>
                    <div class="product-single-content w-50">
                        <h3>Pure Nature Hohey</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">$219.56</span>
                            <ul class="rating pull-right">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li>(05 Customar Review)</li>
                            </ul>
                        </div>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire denounce with righteous indignation</p>
                        <ul class="input-style">
                            <li class="quantity cart-plus-minus">
                                <input type="text" value="1" />
                            </li>
                            <li><a href="cart.html">Add to Cart</a></li>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="#">Honey,</a></li>
                            <li><a href="#">Olive Oil</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal area start -->
    <!-- jquery latest version -->
    <script src="{{ asset('fronend') }}/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('fronend') }}/assets/js/bootstrap.min.js"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{ asset('fronend') }}/assets/js/owl.carousel.min.js"></script>
    <!-- scrollup.js -->
    <script src="{{ asset('fronend') }}/assets/js/scrollup.js"></script>
    <!-- isotope.pkgd.min.js -->
    <script src="{{ asset('fronend') }}/assets/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min.js -->
    <script src="{{ asset('fronend') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- jquery.zoom.min.js -->
    <script src="{{ asset('fronend') }}/assets/js/jquery.zoom.min.js"></script>
    <!-- countdown.js -->
    <script src="{{ asset('fronend') }}/assets/js/countdown.js"></script>
    <!-- swiper.min.js -->
    <script src="{{ asset('fronend') }}/assets/js/swiper.min.js"></script>
    <!-- metisMenu.min.js -->
    <script src="{{ asset('fronend') }}/assets/js/metisMenu.min.js"></script>
    <!-- mailchimp.js -->
    <script src="{{ asset('fronend') }}/assets/js/mailchimp.js"></script>
    <!-- jquery-ui.min.js -->
    <script src="{{ asset('fronend') }}/assets/js/jquery-ui.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('fronend') }}/assets/js/scripts.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
    @yield('fotter_script')
</body>

</html>