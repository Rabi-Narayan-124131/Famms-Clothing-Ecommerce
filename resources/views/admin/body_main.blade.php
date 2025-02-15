<div class="main-panel">
    <div class="content-wrapper">


        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Products</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $totalProduct }}</h2>
                                    {{-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">

                                <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Orders</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $totalOrder }}</h2>
                                    {{-- <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Customers</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $totalUser }}</h2>
                                    {{-- <p class="text-danger ms-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Revenue</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">${{ $totalRevenue }}</h2>
                                    {{-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Order Delivered</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $totalDelivered }}</h2>
                                    {{-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Order Processing</h5>
                        <div class="row">
                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                    <h2 class="mb-0">{{ $totalProcessing }}</h2>
                                    {{-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                                {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                            </div>
                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>
                            </div>
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
