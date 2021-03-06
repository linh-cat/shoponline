@extends('welcome')
@section('content')
<!--features_items-->
<div class="features_items">
    <h2 class="title text-center">Result</h2>
    @foreach ($search as $key => $searchs)
    <a href="{{URL::to('/details'.'/'. $searchs->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'. $searchs->product_image)}}" alt="pro" />
                        <h2>{{number_format($searchs->product_price) . " " .'vnđ' }}</h2>
                        <p>{{$searchs->product_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<!--features_items-->

@endsection
