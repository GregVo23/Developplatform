<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Heebo:300,400,500,700,900" rel="stylesheet" type="text/css" />
    <!--<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />-->
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/custom.css" type="text/css" />

    <!-- Specific Stylesheet -->
    <link rel="stylesheet" href="css/fonts.css" type="text/css" />
    <link rel="stylesheet" href="css/freelancer.css" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/colors.php?color=f7c25e" type="text/css" />

    <!-- Document Title
    ============================================= -->
    <title>Develop Platform | Designer & Developer réalisent vos projets</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="stretched">



    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="border-b-0 no-sticky transparent-header">
            <div id="header-wrap">
                <div class="container mx-auto sm:px-4">
                    <div class="header-row">

                        <!-- Logo
                        ============================================= -->
                        <div id="logo">
                            <a href="{{ url('/') }}" class="standard-logo"><img src="./images/logo.svg" alt="Logo"></a>
                            <a href="{{ url('/') }}" class="retina-logo"><img src="./images/logo.svg" alt="Logo"></a>
                        </div><!-- #logo end -->

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                        </div>

                        <!-- Primary Navigation
                        ============================================= -->
                        <nav class="primary-menu">

                            <ul class="menu-container">
                                <li class="menu-item"><a class="menu-link" href="{{ url('/customer') }}"><div>Demandeur</div></a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('/maker') }}"><div>Réalisateur</div></a></li>
                                <li class="menu-item"><a class="menu-link" href="#" data-scrollto="#footer" data-easing="easeInOutExpo" data-speed="1250" data-offset="70"><div>A propos</div></a></li>
                            <li class="menu-item">
                                @auth
                                <a href="{{ url('/projets') }}" class="button button-border rounded-full py-2 px-4">Mes projets</a>
                                @else
                                <a href="{{ route('login') }}" class="button button-border rounded-full py-2 px-4">Connexion</a></li>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="button button-border rounded-full py-2 px-4">S'enregistrer</a>
                                    @endif
                                @endauth
                            </ul>

                        </nav><!-- #primary-menu end -->
                    </div>
                </div>
            </div>
        </header><!-- #header end -->

        <!-- Slider
        ============================================= -->
        <section id="slider" class="slider-element min-vh-md-100 py-4 include-header" style="background: #e5e5e5 repeat top center; background-size: cover; z-index: 1;">
            <div class="slider-inner">
                <div class="vertical-middle slider-element-fade" style="background-color: #e5e5e5">
                    <div class="container mx-auto sm:px-4 text-center py-5" style="background-color: white">
                        <div class="emphasis-title mb-2">
                            <h4 class="uppercase ls3 font-weight-bolder mb-0">Demandes de <strong>réalisations</strong> à une communauté de</h4>
                            <h1>
                                <span id="oc-images" class="owl-carousel image-carousel carousel-widget" data-items="1" data-margin="0" data-autoplay="3000" data-loop="true" data-nav="false" data-pagi="false" data-animate-in="fadeInUp">
                                    <div class="oc-item gradient-text gradient-red-yellow uppercase">Designers</div>
                                    <div class="oc-item gradient-text gradient-red-yellow uppercase">Développeurs</div>
                                </span>
                            </h1>
                        </div>
                        <!-- <div class="flex items-center justify-center mb-5">
                            <img src="demos/freelancer/images/face.svg" alt="Face" width="60">
                            <span class="uppercase font-bold ml-3">SemiColonWeb</span>
                        </div> -->
                        <div class="mx-auto"  style="max-width: 600px">
                            <p class="text-xl font-normal text-gray-900 mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, atque. Minus, harum porro unde quisquam! Minima vitae neque hic vel porro quidem totam. </p>
                            <a href="#" class="button button-dark button-hero h-translatey-3 tf-ts button-reveal overflow-visible bg-gray-900 text-right"><span>Je demande</span><i class="icon-line-arrow-right"></i></a>
                            <a href="#" data-scrollto="#footer" data-easing="easeInOutExpo" data-speed="1250" data-offset="70" class="button button-large button-light text-gray-900 bg-transparent m-0" style="z-index: 1;"><i class="icon-line2-arrow-down font-bold"></i> <u>Chercher un projet</u></a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #slider end -->
        <!--<img src="./images/left.jpg" style="position:absolute; left:0; z-index: 2; width: 200px;">
        <img src="./images/right.jpg" style="position:absolute; right:0; z-index: 2; width: 200px;">-->

        <!-- Content
        ============================================= -->

        <section style="background: #e5e5e5">
            <div class="container mx-auto sm:px-4" style="width:100%;">
                <div style="display:flex; flex-wrap:nowrap; justify-content:space-between;">
                    <img src="./images/left.jpg" style="max-width: 200px;">
                    <div class="m-12 p-12 text-center">
                        <h3 class="font-weight-bolder h1 mb-4">Designer & Developer, to make your <span class="gradient-text gradient-horizon">projets</span></h3>
                        <p class="mb-5 text-xl font-light text-black-50 font-weight-extralight">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, atque. Minus, harum porro unde quisquam! Minima vitae neque hic vel porro quidem totam.</p>
                    </div>
                    <img src="./images/right.jpg" style="float:right; max-width: 220px;">
                </div>
            </div>
        </section>

        <section id="content">
            <div class="content-wrap p-0">
                <div class="section mb-0 pt-3 pb-0" style="background-color: #F4F4F4; margin-top: 0px; overflow: visible;">
                    <div class="container mx-auto sm:px-4">
                        <div class="flex flex-wrap  justify-center text-center mt-5">
                            <div class="lg:w-1/2 pr-4 pl-4">
                                <div>
                                    <h3 class="font-weight-bolder h1 mb-4">Designer & Developer, to make your <span class="gradient-text gradient-horizon">projets</span></h3>
                                    <p class="mb-5 text-xl font-light text-black-50 font-weight-extralight">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, atque. Minus, harum porro unde quisquam! Minima vitae neque hic vel porro quidem totam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center relative">
                        <div class="parallax min-vh-75" style="background-image: url('./images/designer-project.jpg'); background-size: cover; background-position: center center;" data-bottom-top="width: 40vw" data-center-top="width: 100vw;">
                            <div class="flex flex-wrap  items-center justify-center h-full">
                                <div class="col-auto text-center">
                                    <a href="#" class="text-4xl font-weight-bolder text-white inline-block mx-4 h-op-08 op-ts"><u>Welcome</u></a>
                                    <a href="#" class="text-4xl font-weight-bolder text-white inline-block mx-4 h-op-08 op-ts"><u>to the comun</u></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto sm:px-4" style="max-width: 1000px">
                    <div class="flex flex-wrap  col-mb-30 mt-5">
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="flex items-center justify-center">
                                <div class="counter counter-xlarge text-gray-900 font-weight-bolder"><span data-from="1" data-to="15" data-refresh-interval="2" data-speed="600"></span></div>
                                <span>+ Years Of<br>Experience.</span>
                            </div>
                        </div>

                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="flex items-center justify-center">
                                <div class="counter counter-xlarge text-gray-900 font-weight-bolder"><span data-from="4" data-to="83" data-refresh-interval="50" data-speed="1500"></span></div>
                                <span>% of Works <br>Completed.</span>
                            </div>
                        </div>

                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="flex items-center justify-center">
                                <div class="counter counter-xlarge text-gray-900 font-weight-bolder"><span data-from="5" data-to="100" data-refresh-interval="30" data-speed="1200"></span></div>
                                <span>% Satisfied<br>Customers.</span>
                            </div>
                        </div>
                    </div>
                    <div class="line line-sm mb-0"></div>
                </div>
            </div>
        </section>
        <!-- #content end -->

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="border-0" style="background-color: #C9D6CF;">

            <div class="container mx-auto sm:px-4">
                <div class="footer-widgets-wrap  m-0">

                    <div class="flex flex-wrap  justify-between">

                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="widget">

                                <h3 class="h1 mb-5">Suivez-nous sur nos réseaux sociaux</h3>
                                <span class="text-black-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis quisquam aspernatur vero voluptas.</span>
                                <a href="mailto:noreply@canvas.com" class="h4 text-gray-900 mt-5 mb-4 block"><u>info@developplatform
                                    .com</u> <i class="icon-line-arrow-right relative ml-2" style="top: 3px"></i></a>
                                <div>
                                    <a href="http://facebook.com/" class="social-icon si-small si-colored si-facebook" target="_blank">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="http://instagram.com/" class="social-icon si-small si-colored si-instagram" target="_blank">
                                        <i class="icon-instagram"></i>
                                        <i class="icon-instagram"></i>
                                    </a>
                                    <a href="http://youtube.com/" class="social-icon si-small si-colored si-youtube" target="_blank">
                                        <i class="icon-youtube"></i>
                                        <i class="icon-youtube"></i>
                                    </a>
                                    <a href="#" class="social-icon si-small si-colored si-flattr">
                                        <i class="icon-flattr"></i>
                                        <i class="icon-flattr"></i>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="md:w-2/5 pr-4 pl-4">
                            <h3 class="h1 mb-5">Vous avez une question ?</h3>
                            <div class="form-widget" data-loader="button" data-alert-type="inline">

                                <div class="form-result"></div>

                                <form class="flex flex-wrap  mb-0" id="landing-enquiry" action="include/form.php" method="post" enctype="multipart/form-data">
                                    <div class="form-process"></div>
                                    <div class="w-full mb-4">
                                        <label>Votre nom ?</label>
                                        <input type="text" name="landing-enquiry-name" id="landing-enquiry-name" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded border-form-control required" value="">
                                    </div>
                                    <div class="w-full mb-4">
                                        <label>Votre adresse email ?</label>
                                        <input type="email" name="landing-enquiry-email" id="landing-enquiry-email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded border-form-control required" value="">
                                    </div>
                                    <div class="w-full mb-4">
                                        <label>Votre question ?:</label>
                                        <textarea name="landing-enquiry-additional-requirements" id="landing-enquiry-additional-requirements" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded border-form-control" cols="10" rows="3"></textarea>
                                    </div>
                                    <div class="w-full hidden">
                                        <input type="text" id="landing-enquiry-botcheck" name="landing-enquiry-botcheck" value="" />
                                    </div>
                                    <div class="w-full">
                                        <button type="submit" name="landing-enquiry-submit" class="button h-translatey-3 bg-gray-900 rounded-full py-2 px-4"><i class="icon-line-arrow-right m-0"></i></button>
                                    </div>

                                    <input type="hidden" name="prefix" value="landing-enquiry-">
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-double-angle-up bg-white text-gray-900 rounded-full shadow"><i class="fas fa-arrow-up"></i></div>

    <!-- External JavaScripts
    ============================================= -->
    <script src="js/jquery.js"></script>
    <script src="js/plugins.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>

    <script>
        // Owl Carousel Scripts
        jQuery(window).on( 'pluginCarouselReady', function(){
            $('#oc-services').owlCarousel({
                items: 1,
                margin: 30,
                nav: false,
                dots: true,
                smartSpeed: 400,
                responsive:{
                    576: { stagePadding: 30, items: 1 },
                    768: { stagePadding: 30, items: 2 },
                    991: { stagePadding: 150, items: 3 },
                    1200: { stagePadding: 150, items: 3}
                },
            });
        });
    </script>
</body>
</html>
