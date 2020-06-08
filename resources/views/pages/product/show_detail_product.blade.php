@extends('welcome')

@section('content')
<!--product-details-->
@foreach ($detail_products as $key => $detail)
<div class="product-details">
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('public/uploads/product/'. $detail->product_image)}}" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>

                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$detail->product_name}}</h2>
            <p>Web ID: {{$detail->product_id}}</p>
            <img src="images/product-details/rating.png" alt="" />
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{ csrf_field() }}
                <span>
                    <span>{{number_format($detail->product_price) . " " .'vnđ' }}</span>
                    <label>Quantity:</label>
                    <input type="number" value="1" min="1" name="qty"/>
                    <input type="hidden" value="{{$detail->product_id}}" name="product_id_hidden">
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </span>
            </form>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> {{$detail->brand_name}}</p>
            <p><b>Category:</b> {{$detail->category_name}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div>

<!--category-tab-->
<div class="category-tab shop-details-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#description" data-toggle="tab">Description</a></li>
            <li><a href="#details" data-toggle="tab">Details</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="description" >
            <p>{{$detail->product_desc}}</p>
        </div>

        <div class="tab-pane fade" id="details" >
            <p>{{$detail->product_content}}</p>
        </div>
    </div>
</div>
<!--/category-tab-->
@endforeach

@endsection
