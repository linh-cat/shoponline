@extends('welcome')
@section('content')
<!--features_items-->
<div class="features_items">
    @foreach ($brand_name as $key => $brand_by_ids)
    <h2 class="title text-center">{{$brand_by_ids->brand_name}}</h2>
    @endforeach
    @foreach ($brand_by_id as $key => $product)
    <a href="{{URL::to('/details'.'/'. $product->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'. $product->product_image)}}" alt="pro" />
                        <h2>{{number_format($product->product_price) . " " .'VND' }}</h2>
                        <p>{{$product->product_desc}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>

                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<!--features_items-->

@endsection
