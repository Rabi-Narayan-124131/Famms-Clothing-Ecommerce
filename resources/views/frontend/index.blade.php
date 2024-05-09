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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="sub_page">

    @include('sweetalert::alert')

    <div class="hero_area">
        <!-- header section strats -->
        @include('frontend.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('frontend.slider_index')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('frontend.why_index')
    <!-- end why section -->

    <!-- arrival section -->
    @include('frontend.arrival_index')
    <!-- end arrival section -->

    <!-- product section -->
    @include('frontend.product_index')
    <!-- end product section -->

    <!--comment section-->
    @include('frontend.comment_index')
    <!--comment section-->

    <!-- subscribe section -->
    @include('frontend.subscribe_index')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('frontend.client_index')
    <!-- end client section -->
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
