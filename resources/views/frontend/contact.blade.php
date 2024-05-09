<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="">
    <title>Famms - Fashion & Trends</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        @include('frontend.header')
        <!-- end header section -->

        <!-- inner page section -->
        <section class="inner_page_head">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3>Contact Us</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end inner page section -->
    </div>
        <!-- contact section -->
        @include('frontend.contact_index')
        <!-- end contact section -->

        <!-- arrival section -->
        @include('frontend.arrival_index')
        <!-- end arrival section -->

        <!-- footer start -->
        @include('frontend.footer_index')
        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2024 All Rights Reserved By <a href="{{ url('/') }}">Famms</a><br>

                Designed & Developed By <a href="{{ url('/') }}" target="_blank">Rabi Narayan</a>

            </p>
        </div>

    <!-- jQery -->
    <script src="{{ asset('frontend/assets/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('frontend/assets/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>

</html>
