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

                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Send Email to {{ $order->email }}</h4>

                                    <form class="forms-sample" action="{{ url('/send_user_email', $order->id) }}" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Email Greeting</label>
                                            <input type="text" class="form-control input_color" id="exampleInputName1" name="greeting"
                                                placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Email First Line</label>
                                            <input type="text" class="form-control input_color" id="exampleInputEmail3" name="first_line"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Email Body</label>
                                            <textarea class="form-control input_color" id="exampleTextarea1" name="mail_body" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Email Button Name</label>
                                            <input type="text" class="form-control input_color" id="exampleInputPassword4" name="mail_button"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Email Url</label>
                                            <input type="text" class="form-control input_color" id="exampleInputName1" name="mail_url"
                                                placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Email Last Line</label>
                                            <input type="text" class="form-control input_color" id="exampleInputName1" name="last_line"
                                                placeholder="Name">
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
