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
        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Our <span>products</span>
                    </h2>
                </div>

                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
                        style="float: right;">x</button>

                </div>
                @endif

                <div class="row">

                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <div class="box">

                            <div class="img-box">
                                <img src="/backend/product-images/{{ $data->image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{ $data->title }}
                                </h5>

                                @if ($data->discount_price != null)

                                <h6 style="color: red">Discount Price<br>
                                    ${{ $data->discount_price }}
                                </h6>

                                <h6 style="text-decoration: line-through; color:blue">
                                    Price <br>${{ $data->price }}
                                </h6>

                                @else

                                <h6 style="color: blue">
                                    Price <br>${{ $data->price }}
                                </h6>


                                @endif

                            </div>

                            <div style="padding: 10px">

                                <h6>Product Category : {{ $data->category }}</h6><br>
                                <h6>Product Details : {{ $data->description }}</h6><br>
                                <h6>Available Quantity : {{ $data->quantity }}</h6>

                            </div>

                            <div class="options" style="padding: 30px">

                                <form action="{{ url('add_to_cart', $data->id) }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="number" name="quantity" value="1" min="1" style="width: 100px">

                                        </div>
                                        <div class="col-md-4">
                                            <input type="submit" class="option2" value="Add to Cart"
                                                style="border-radius: 30px;">

                                        </div>
                                    </div>


                                </form>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>

    </div>

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
