@extends('welcome')
@section('content')
<!--features_items-->
<div class="features_items">
    <h2 class="title text-center">New Product</h2>
    @foreach ($all_product as $key => $product)
    <a href="{{URL::to('/details'.'/'. $product->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'. $product->product_image)}}" alt="pro" />
                        <h2>{{number_format($product->product_price) . " " .'vnđ' }}</h2>
                        <p>{{$product->product_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<!--features_items-->

@endsection
