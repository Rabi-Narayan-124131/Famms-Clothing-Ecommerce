<!DOCTYPE html>
<html lang="en">


<head>
    <title>Product Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="invoice/assets/css/bootstrap.min.css">
    {{-- <link type="text/css" rel="stylesheet" href="invoice/assets/fonts/font-awesome/css/font-awesome.min.css"> --}}

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="invoice/assets/img/favicon.ico" type="image/x-icon" >

    {{-- <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"> --}}

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="invoice/assets/css/style.css">
</head>
<body>

<!-- Invoice 13 start -->
<div class="invoice-13 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner">
                    <div class="invoice-info" id="invoice_wrapper">
                        <div class="invoice-headar">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-name">
                                        <div class="logo">
                                            <img class="logo" src="{{ asset('invoice/assets/img/logo.png') }}" alt="logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice">
                                        <h1 class="text-end">Invoice: #943249</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-number">
                                        <h4 class="inv-title-1">Invoice To</h4>
                                        <p class="invo-addr-1">
                                            {{ $order->name }}  <br/>
                                            {{ $order->email }} <br/>
                                            {{ $order->phone }} <br/>
                                            {{ $order->address }} <br/>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice-number text-end">
                                        <h4 class="inv-title-1">Bill To</h4>
                                        <p class="invo-addr-1">
                                            {{ $order->name }}  <br/>
                                            {{ $order->email }} <br/>
                                            {{ $order->phone }} <br/>
                                            {{ $order->address }} <br/>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <h4 class="inv-title-1">Date</h4>
                                    <p class="inv-from-1">Due Date: 24/09/2021</p>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <h4 class="inv-title-1">Payment Status</h4>
                                    <p class="inv-from-1">{{ $order->payment_status }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-center">
                            <div class="table-responsive">
                                <table class="table table-striped invoice-table">
                                    <thead class="bg-active">
                                    <tr>
                                        <th>Product Name</th>
                                        <th class="text-center">Product Image</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="item-desc-1">
                                                <span>{{ $order->title }}</span>

                                            </div>
                                        </td>
                                        <td class="text-center"><img height="75" width="75"
                                            src="/backend/product-images/{{ $order->image }}"></td>
                                        <td class="text-center">${{ $order->price }}</td>
                                        <td class="text-center">{{ $order->quantity }}</td>
                                        <td class="text-right">$10.99</td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" class="text-end">SubTotal</td>
                                        <td class="text-right">$710.99</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">Tax</td>
                                        <td class="text-right">$85.99</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end f-w-600">Grand Total</td>
                                        <td class="text-right f-w-600">$795.99</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h3 class="inv-title-1">Delivery Status</h3>
                                        <p class="text-13">{{ $order->delivery_status }}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-offsite">
                                    <div class="text-end">
                                        <h3 class="inv-title-1">Payment Info</h3>
                                        <p class="text-13">This payment made by BRAC BANK master card without any problem</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-download">
                            <i class="fa fa-download"></i> Download Invoice
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 13 end -->

<script src="{{ asset('invoice/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('invoice/assets/js/jspdf.min.js') }}"></script>
<script src="{{ asset('invoice/assets/js/html2canvas.js') }}"></script>
<script src="{{ asset('invoice/assets/js/app.js') }}"></script>
</body>


</html>
