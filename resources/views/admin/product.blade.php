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

                                    <form class="forms-sample" action="{{ url('/store_product') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputImage">Product Image</label>
                                            <input type="file" class="form-control input_color" id="exampleInputImage"
                                                name="image" placeholder="Image" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTitle">Product Title</label>
                                            <input type="text" class="form-control input_color"
                                                id="exampleInputProductTitle" name="title" placeholder="Product Title"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputdescription">Product Description</label>
                                            <textarea class="form-control input_color" name="description"
                                                id="exampleInputProductDescription" rows="4"
                                                placeholder="Product Description" required></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Product Category</label>
                                            <select class="form-control input_color" id="exampleSelectCategory"
                                                name="category" required>
                                                <option selected disabled>Product Category</option>
                                                @foreach ($data as $category)
                                                <option value="{{ $category->category_name }}">
                                                    {{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputquantity">Product Quantity</label>
                                            <input type="number" class="form-control input_color"
                                                id="exampleInputquantity" name="quantity" placeholder="Quantity"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputprice">Product Price</label>
                                            <input type="number" class="form-control input_color" id="exampleInputprice"
                                                name="price" required placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTitle">Product Discount Price</label>
                                            <input type="number" class="form-control input_color"
                                                id="exampleInputdiscountprice" name="discount_price"
                                                placeholder="Discount Price" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary me-2">Submit</button>

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
