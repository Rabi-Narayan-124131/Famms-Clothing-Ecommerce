<style>
    .div-search{
        padding: 2rem 0rem !important;
    }
    .search {
        padding: 1rem 5rem !important;
        font-size: 1rem !important;
        line-height: 0.5 !important;
        border-radius: 30px !important;
        color: black !important;
    }

</style>
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <div class="div-search">
                <form action="{{ url('search_product') }}" method="get">

                    @csrf

                    <input type="text" class="form-control" name="search" id="" placeholder="Search for Product" style="width: 500px !important; border-radius: 30px !important;">

                    <button type="submit" class="btn btn-info search">Search</button>
                </form>
            </div>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
                style="float: right;">x</button>

        </div>
        @endif
        <div class="row">

            @foreach ($data as $product)

            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $product->id) }}" class="option1">
                                Product Details
                            </a>

                            <form action="{{ url('add_to_cart', $product->id) }}" method="post">
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
                    <div class="img-box">
                        <img src="/backend/product-images/{{ $product->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $product->title }}
                        </h5>

                        @if ($product->discount_price != null)

                        <h6 style="color: red">Discount Price<br>
                            ${{ $product->discount_price }}
                        </h6>

                        <h6 style="text-decoration: line-through; color:blue">
                            Price <br>${{ $product->price }}
                        </h6>

                        @else

                        <h6 style="color: blue">
                            Price <br>${{ $product->price }}
                        </h6>


                        @endif

                    </div>
                </div>
            </div>


            @endforeach

            <span style="padding: 20px">

                {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}

            </span>

        </div>
        <div class="btn-box">
            <a href="{{ url('/product') }}">
                View All products
            </a>
        </div>
    </div>
</section>
