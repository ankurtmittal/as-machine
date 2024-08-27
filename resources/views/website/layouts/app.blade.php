<!doctype html>
<html lang="en">
<head>
    <title><?php echo $title??" " ?>  - Z-One </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="icon" href="{{ asset($logo->value??'asstes/images/as-logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('website/style.css')}}">
    <!-- Faq CSS  -->
    <link rel="stylesheet" href="{{ asset('website/faq.css') }}">
    <!-- About_us CSS  -->
    <link rel="stylesheet" href="{{ asset('website/about_us.css') }}">
     <!-- Gallery CSS  -->
    <link rel="stylesheet" href="{{ asset('website/gallery.css') }}">
     <!-- contact_us CSS  -->
    <link rel="stylesheet" href="{{ asset('website/contact_us.css') }}">
     <!-- get_a_quote CSS  -->
    <link rel="stylesheet" href="{{ asset('website/get_a_quote.css') }}">
     <!-- products_details CSS  -->
    <link rel="stylesheet" href="{{ asset('website/products_details.css') }}">

</head>

<body>
    <div class="container">
        <div class="row pt-3 border-bottom ">
            <div class="col-md-6">
                <p class="one_mail_p"><span><i class="fa-solid fa-message"></i></span> info@Z-oneautoparts.com</p>
            </div>
            <div class="col-md-6 text-right">
                <p class="one_mail_p">Follow Us : <span><i class="fa-brands fa-facebook-f"></i> <i
                            class="fa-brands fa-twitter"></i> <i class="fa-brands fa-instagram"></i> <i
                            class="fa-brands fa-pinterest"></i></span></p>
            </div>
        </div>

        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent mt-3 mb-4">
            <div class="container-fluid z-stic">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset($logo->value??'asstes/images/as-logo.png') }}" alt="" width="140px"
                        class="animate__animated   animate__heartBeat"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                        <div class="container-fluid nav_list mt-2">
                            <center>
                                <ul class="active_set">
                                    <li><a href="{{route('home')}}" class="<?php if ('Home' == $title):?> a_fist_1 <?php endif;?>">Home</a></li>
                                    <li><a href="{{ route('categories') }}" class="<?php if ('Categories' == $title):?> a_fist_1 <?php endif;?>">Categories</a></li>
                                    <li><a href="{{ route('aboutUs') }}" class="<?php if ('About Us' == $title):?> a_fist_1 <?php endif;?>">About us</a></li>
                                    <li><a href="{{ route('faq') }}" class="<?php if ('FAQ' == $title):?> a_fist_1 <?php endif;?>">FAQ</a></li>
                                    <li><a href="{{ route('web_gallery') }}" class="<?php if ('Gallery' == $title):?> a_fist_1 <?php endif;?>">Gallery</a></li>
                                    <li><a href="{{ route('contactUs') }}" class="<?php if ('Contact Us' == $title):?> a_fist_1 <?php endif;?>">Contact us</a></li>
                                </ul>
                            </center>
                        </div>
                    </ul>
                    <form class="d-flex">

                        <a href="{{ route('get_a_quote') }}" style="text-decoration: none;"class=" get_a_quote_btn d-block mx-auto" type="submit">Get a Quote</a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- navbar end -->


    </div>
    <!-- sticky nav start -->

    <!-- sticky nav end -->


    @yield('content')


    <!-- seven section end -->

    </div>

    <footer>
    <div class="footer_down pb-5">
         <div class="container-fluid">
           <div class="container pt-5">
             <div class="row">
                 <div class="col-lg-3">
                     <div class="row">
                         <div class="col-md-5">
                            <a href="{{ route('home') }}" ><img src="{{ asset($logo->value??'asstes/images/as-logo.png') }}" alt="" width="200px"></a>
                         </div>

                     </div>

                     <p class="footer_lorem pt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                     <ul class="footer_nd_list">
                        <li>
                            <div class="reduis_angle">
                                <i class="fa-brands fa-facebook-f "></i>
                            </div>
                        </li>

                        <li>
                            <div class="reduis_angle">
                                <i class="fa-brands fa-twitter"></i>
                            </div>
                        </li>

                        <li>
                            <div class="reduis_angle">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                        </li>

                        <li>
                            <div class="reduis_angle">
                                <i class="fa-brands fa-pinterest"></i>
                            </div>
                        </li>

                    </ul>
                    </div>
                 <div class="col-lg-9">
                     <div class="row">
                         <div class="col-lg-4 about_ft">
                             <h5 class="about_h5 px-4">Links</h5>
                             <ul class="about_us_ul">
                                 <a href="{{ route('home') }}" style="text-decoration:none"><li>Home</li></a>
                                 <a href="{{ route('categories') }}" style="text-decoration:none"><li>Categories</li></a>
                                 <a href="{{ route('aboutUs') }}" style="text-decoration:none"><li>About us</li></a>
                                 <a href="{{ route('contactUs') }}" style="text-decoration:none"><li>Contact us</li></a>
                             </ul>
                         </div>

                         <div class="col-lg-4 about_ft">
                             <h5 class="about_h5 px-4">Newsletter</h5>
                             <ul class="about_us_ul">
                                <input type="text" name="" id="" placeholder="Enter email" class="input2">
                                <!-- <a href="#" style="text-decoration: none; width: 100px; text-align: left;"class=" get_a_quote_btn d-block mx-auto" type="submit">Send</a> -->
                                <button class="px-5 my-4 get" style="border-radius: 5px;">Send</button>
                             </ul>
                         </div>

                         <div class="col-lg-4 about_ft">
                             <h5 class="about_h5 px-4">About</h5>
                             <ul class="about_us_ul">
                                <a href="{{ route('aboutUs') }}" style="text-decoration:none"><li>About Us</li></a>
                                 <li>Careers</li>
                                 <li> Disclosures & Disclimers</li>
                                <a href="{{ route('contactUs') }}" style="text-decoration:none"><li>Contact US</li></a>
                                 <li>Company Names</li>

                             </ul>
                         </div>

                     </div>
                 </div>
             </div>



           </div>
         </div>
        </div>
       </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"> </script>

    <script>
        $(document).ready(function () {
            var owl = $('.brands_parts_slider4');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 1,
            });

            // Custom Button
            $('.customNextBtn4').click(function () {
                owl.trigger('next.owl.carousel');
            });
            $('.customPreviousBtn4').click(function () {
                owl.trigger('prev.owl.carousel');
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            var owl = $('.brands_parts_slider3');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 1,
            });

            // Custom Button
            $('.customNextBtn3').click(function () {
                owl.trigger('next.owl.carousel');
            });
            $('.customPreviousBtn3').click(function () {
                owl.trigger('prev.owl.carousel');
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            var owl = $('.brands_parts_slider2');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: true,


                responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
            });

            // Custom Button
            $('.customNextBtn2').click(function () {
                owl.trigger('next.owl.carousel');
            });
            $('.customPreviousBtn2').click(function () {
                owl.trigger('prev.owl.carousel');
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            var owl = $('.brands_parts_slider');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 1,
            });

            // Custom Button
            $('.customNextBtn1').click(function () {
                owl.trigger('next.owl.carousel');
            });
            $('.customPreviousBtn1').click(function () {
                owl.trigger('prev.owl.carousel');
            });

        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('#owl2').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        })

        $('#owlCarousel2').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        })

    </script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })

    </script>


</div>
</body>
</html>
