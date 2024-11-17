<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="icon" href="/logo.png" type="image/x-icon">
    <title>BlockFore</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ownstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .background-header {
            background-color: rgb(16, 112, 255) !important;
            color: white !important;
        }

        .header-area {
            background-color: rgb(16, 112, 255) !important;
        }

        #preloader {
            background-image: linear-gradient(145deg, rgb(16, 112, 255) 0%, rgb(16, 112, 255) 100%);
        }

        .header-area.header-sticky .nav li a.active {
            color: black !important;
        }

        body {
            font-family: 'Sen', sans-serif !important;
        }

        footer .social li a {
            background-color: rgb(16, 112, 255) !important;
        }

        .sniff-item {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        #sniffData {
            font-family: 'Courier New', monospace;
            padding: 20px;
            background-color: #EDEDED;
            border-radius: 5px;
            color: #000000;
            opacity: 100%;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .left-text {
            text-align: justify;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/ownstyle.css">
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo" style="color: white !important;">BLOCKFORE</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="color: white !important;">
                            <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="/results">Results</a></li>
                            <li><a data-toggle="modal" data-target="#logoutModal"
                                    class="cursorPoint decorationNone">Logout</a></li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <br>
    <br>
    <br>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>



    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2024</p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <div class="modal fade " id="forecastModal" tabindex="-1" role="dialog" aria-labelledby="forecastModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forecastModalLabel">Forecast</h5>
                </div>
                <form action="/forecast" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input required class="form-control" type="number" name="temp"
                                        id="fn" placeholder="Temperature">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="humidity" id="mn"
                                        placeholder="Humidity">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="windSpeed" id="ln"
                                        placeholder="Wind Speed">
                                </div>
                                <div class="form-group">
                                    <label for="forecastDate">Forecast Date:</label>
                                    <br>
                                    <input type="date" name="forecastDate" id="forecastDate"
                                        class="form-control">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnForecast" value="yes">Proceed
                            Forecasting</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade " id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/logout" method="GET" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>
                                <h5><b>Are You Sure You Want To Logout?</b></h5>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnWhite" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btnWhite" name="btnLogin" value="yes">Yes,
                            Proceed</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('modals.success')
    @include('modals.error')
    @if (session()->pull('successLogin'))
        <script>
            setTimeout(() => {
                document.getElementById('successMsg').innerHTML = "Successfully Login";
                document.getElementById('btnSuccessModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseSuccessModal').click();
                }, 1200);
            }, 500);
        </script>
        {{ session()->forget('successLogin') }}
    @endif

    @if (session()->pull('errorLogin'))
        <script>
            setTimeout(() => {
                document.getElementById('errorMsg').innerHTML = "Wrong Email or Password";
                document.getElementById('btnErrorModal').click();
                setTimeout(() => {
                    document.getElementById('btnCloseErrorModal').click();
                }, 1500);
            }, 500);
        </script>
        {{ session()->forget('errorLogin') }}
    @endif
    <script>
        const today = new Date().toISOString().split('T')[0];
        const forecastDateInput = document.getElementById('forecastDate');
        forecastDateInput.setAttribute('min', today);
    </script>
</body>

</html>
