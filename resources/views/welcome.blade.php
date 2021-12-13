<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mis Registros |</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/inicio/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/inicio/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/inicio/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/inicio/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/inicio/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/inicio/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/inicio/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Techie - v2.2.1
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-9 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="#">Bienvenido</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>

                            <li><a href="#about">Acerca</a></li>

                            <li><a href="#contact">Contactos</a></li>

                        </ul>
                    </nav><!-- .nav-menu -->
                    @auth
                    <a href="{{url('home')}}" class="get-started-btn scrollto">{{auth()->user()->name}}</a>
                    @endauth
                </div>
            </div>
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section style="background-position: center center;background-size: cover;background-image: url({{asset('assets/welcome/images/fondo_welcome.png')}})" id="hero" class="d-flex align-items-center">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Mis Registros</h1>
                    <h2>Sistema de gestión de registros de denuncias.</h2>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                    <div><a href="{{ route('login') }}" class="btn-get-started scrollto">Iniciar Sesión</a></div>
                    @endauth
                    @endif
                </div>
                <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                    <img src="{{asset('assets/welcome/images/logo.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>
            <!-- ======= Footer ======= -->
            <footer style="background:transparent" id="footer">
                <div class="container">

                    <div class="copyright-wrap d-md-flex py-4">
                        <div class="mr-md-auto text-center text-md-left">
                           
                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>
                        </div>
                        <div class="credits text-md-right pt-3 pt-md-0">
                            Developed by <strong>Caresoft</strong>
                        </div>
                    </div>

                </div>
            </footer><!-- End Footer -->
        </div>

    </section><!-- End Hero -->




    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/inicio/vendor/jquery/jquery.min.js"></script>
    <script src="assets/inicio/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/inicio/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/inicio/vendor/php-email-form/validate.js"></script>
    <script src="assets/inicio/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/inicio/vendor/counterup/counterup.min.js"></script>
    <script src="assets/inicio/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/inicio/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/inicio/vendor/venobox/venobox.min.js"></script>
    <script src="assets/inicio/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/inicio/js/main.js"></script>

</body>

</html>