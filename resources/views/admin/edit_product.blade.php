<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.head_css')
    <style>
        .input_color {
            color: black;
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
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
                                style="float: right;">X</button>

                        </div>
                        @endif

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <form class="forms-sample" action="{{ url('/update_product', $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Old
                                                Image</label>
                                            <div class="col-sm-9">
                                                <img height="100" width="100"
                                                    src="/backend/product-images/{{ $data->image }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputImage" class="col-sm-3 col-form-label">Product
                                                Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control input_color"
                                                    id="exampleInputImage" name="image" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputProductTitle"
                                                class="col-sm-3 col-form-label">Product Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control input_color"
                                                    id="exampleInputProductTitle" name="title"
                                                    value="{{ $data->title }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputProductDescription"
                                                class="col-sm-3 col-form-label">Product Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control input_color" name="description"
                                                    id="exampleInputProductDescription" rows="4"
                                                    required>{{ $data->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputProductCategory"
                                                class="col-sm-3 col-form-label">Product Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control input_color" id="exampleSelectCategory"
                                                    name="category" required>
                                                    <option selected value="{{ $data->category }}">{{ $data->category }}</option>
                                                    @foreach ($cdata as $category)
                                                    <option value="{{ $category->category_name }}">
                                                        {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputProductQuantity"
                                                class="col-sm-3 col-form-label">Product Quantity</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control input_color"
                                                    id="exampleInputquantity" name="quantity"
                                                    value="{{ $data->quantity }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputProductPrice"
                                                class="col-sm-3 col-form-label">Product Price</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control input_color"
                                                    id="exampleInputprice" name="price" required
                                                    value="{{ $data->price }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputProductDiscountPrice"
                                                class="col-sm-3 col-form-label">Product Discount Price</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control input_color"
                                                    id="exampleInputdiscountprice" name="discount_price"
                                                    value="{{ $data->discount_price }}">
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary me-2">Update</button>

                                    </form>
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
