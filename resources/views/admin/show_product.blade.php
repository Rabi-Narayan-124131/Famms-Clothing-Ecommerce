<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.head_css')
    <style>
        .input_color{
            color:black;
            background-color: #ffffff !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar_nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('admin.topbar_nav')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Form elements </h3>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                          </ol>
                        </nav>
                    </div>

                    <div class="row">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="float: right;" >X</button>

                        </div>
                    @endif

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Table</h4>
                                <p class="card-description"> Add class <code>.table</code>
                                </p>
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="color: #00d9ff"> Product Image </th>
                                        <th style="color: #00d9ff"> Product Title </th>
                                        <th style="color: #00d9ff"> Product Description </th>
                                        <th style="color: #00d9ff"> Product Category </th>
                                        <th style="color: #00d9ff"> Product Quantity </th>
                                        <th style="color: #00d9ff"> Product Price </th>
                                        <th style="color: #00d9ff"> Product Discount Price </th>

                                        <th style="color: #00d9ff"> Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $product)

                                        <tr>

                                        <td><img height="75" width="75" src="/backend/product-images/{{ $product->image }}"></td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->discount_price }}</td>
                                        <td>
                                            <a href="{{ url('/edit_product',$product->id) }}">
                                                <button type="button" class="btn btn-inverse-info btn-sm">Edit</button>
                                            </a>
                                            <a href="{{ url('/delete_product',$product->id) }}">
                                                <button type="button" class="btn btn-inverse-danger btn-sm" onclick="return confirm('Are you Sure to Delete this')" >Delete</button>
                                            </a>
                                        </td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Famms 2024</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Designed & Developed by<a
                                href="{{ url('/') }}" target="_blank">Rabi Narayan</a> </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.bot_js')
    <!-- End custom js for this page -->
</body>

</html>
