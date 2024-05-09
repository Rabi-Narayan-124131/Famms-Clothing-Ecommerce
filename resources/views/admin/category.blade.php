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
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">

                                <form class="forms-sample" action="{{ url('/store_category') }}" method="post">

                                    @csrf

                                  <div class="form-group row">
                                    <label for="exampleInputCategory" class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                      <input type="text" name="category_name" class="form-control input_color" id="exampleInputCategory" placeholder="Category">
                                    </div>
                                  </div>

                                  <button type="submit" class="btn btn-primary me-2">Submit</button>

                                </form>
                              </div>
                            </div>
                        </div>

                        <div class="col-lg-8 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">Bordered table</h4>
                                <p class="card-description"> Add class <code>.table-bordered</code>
                                </p>
                                <div class="table-responsive">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th style="color: #00d9ff"> # </th>

                                        <th style="color: #00d9ff"> Category Name </th>

                                        <th style="color: #00d9ff"> Actions </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $category)

                                        <tr>
                                          <td>{{ $category->id }}</td>

                                          <td>{{ $category->category_name }}</td>

                                          <td>

                                            <a href="{{ url('/delete_category',$category->id) }}">
                                                <button type="button" class="btn btn-inverse-danger btn-sm">Delete</button>
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
