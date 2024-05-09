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

    <style>
        .total_deg {
            font-size: 30px;
            padding: 30px;

        }

        .purchase_deg {
            font-size: 20px;
            padding: 10px;
            text-align: center;
        }

        .button {
            border: none;
            padding: 17px 45px;
            width: 167px;
            font-size: 16px;
            text-transform: capitalize;
            line-height: normal;
            margin: 0 auto;
            display: flex;
            background: #333;
            color: #fff;
            font-weight: 600;
            transition: ease all 0.1s;
        }

        .payment {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 30px;
            width: 230px !important;
            text-align: center;
            -webkit-transition: all .3s;
            transition: all .3s;
            margin: 5px 0;
        }

    </style>

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
                        Your <span>cart</span>
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

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: #c78c1f"> Product Image </th>
                                                <th style="color: #c78c1f"> Product Title </th>

                                                <th style="color: #c78c1f"> Product Quantity </th>
                                                <th style="color: #c78c1f"> Product Price </th>

                                                <th style="color: #c78c1f"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $total_price = 0; ?>

                                            @foreach ($cart as $product)

                                            <tr>

                                                <td><img height="75" width="75"
                                                        src="/backend/product-images/{{ $product->image }}"></td>
                                                <td>{{ $product->title }}</td>

                                                <td>{{ $product->quantity }}</td>
                                                <td>${{ $product->price }}</td>

                                                <td>

                                                    <button type="button" style="color: black"
                                                        class="btn btn-danger btn-sm"><a class="confirm-delete"
                                                            href="{{ url('/remove_cartproduct',$product->id) }}"
                                                            onclick="confirmation(event)">Remove</a></button>
                                                </td>

                                            </tr>

                                            <?php $total_price = $total_price + $product->price ?>

                                            @endforeach
                                        </tbody>
                                    </table>



                                    <div class="options total_deg">

                                        <div class="row">
                                            <div class="col-md-9">

                                                <p>Total Price : ${{ $total_price }}</p>

                                            </div>
                                            <div class="col-md-3">

                                                <button type="button" class="option2 button" id="buy_now"
                                                    style="border-radius: 40px;">Buy Now</button>

                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12" id="appear" style="display: none">
                        <div class="box">

                            <div class="options purchase_deg">

                                <p style="padding: 20px">Proceed To Order</p>
                                <div class="row">
                                    <div class="col-md-6 ">

                                        <a href="{{ url('cash_order') }}" class="option2 payment">
                                            Cash On Delivery
                                        </a>


                                    </div>
                                    <div class="col-md-6">

                                        <a href="{{ url('stripe', $total_price) }}" class="option2 payment">
                                            Pay Using Card
                                        </a>

                                    </div>
                                </div>



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

    <script>
        $("#buy_now").click(
            function () {

                $("#appear").show();
            }
        )
        $("#cancel").click(
            function () {

                $("#appear").hide();
            }
        )

        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); // Get the URL from the link that was clicked
            console.log(urlToRedirect);
            swal({
                    title: "Are you sure?",
                    text: "Once removed, you will not be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancle) => {
                    if (willCancle) {
                        window.location.href = urlToRedirect;
                    } else {
                        swal("Your item is safe!");
                    }
                });
        }

        // Call the refreshPage function after an item is removed from the cart
        Swal.fire({
            title: 'Success',
            text: 'Product removed from cart!',
            icon: 'success',
            confirmButtonText: 'OK',
        }).then(function () {
            location.reload();
        });

    </script>

</body>

</html>
