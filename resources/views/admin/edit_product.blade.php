@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<p class="alert alert-success">'. $message .'</p>';
                                Session::put('message', null);
                            }
                        ?>
                        @foreach ($edit_product as $key => $pro)
                        <form role="form" action="/update-product/{{$pro->product_id}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Brand Name" value="{{$pro->product_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Description</label>
                                <textarea style="resize: none;" rows="2" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Description">{{$pro->product_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Product Content</label>
                                <textarea style="resize: none;" rows="2" name="product_content" class="form-control" id="exampleInputPassword2" placeholder="Content">{{$pro->product_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="product_image" class="form-control">
                                <img src="{{URL::to('public/uploads/product/'. $pro->product_image)}}" alt="pro" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail5">Product Price</label>
                                <input type="text" value="{{$pro->product_price}}" name="product_price" class="form-control" id="exampleInputEmail5" placeholder="Brand Price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Category</label>
                                    <select class="form-control input-sm m-bot15 mb-5" name="product_category">
                                    @foreach ($cate_product as $key=>$cate)
                                        @if ($cate->category_id == $pro->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else{
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        }
                                        @endif
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Brand</label>
                                    <select class="form-control input-sm m-bot15 mb-5" name="product_brand">
                                        @foreach ($brand_product as $key=>$brand)
                                        @if ($brand->brand_id == $pro->brand_id)
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else{
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        }
                                        @endif
                                    @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Display</label>
                                <select class="form-control input-sm m-bot15 mt-5" name="product_status">
                                    <option value="1">Block</option>
                                    <option value="0">None</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info" name="add_product">Update Product</button>
                        </form>
                        @endforeach

                    </div>
                </div>
            </section>

    </div>
</div>
@endsection
