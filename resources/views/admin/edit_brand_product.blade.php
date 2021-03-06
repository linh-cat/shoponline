@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Brand Product
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
                        @foreach ($edit_brand_product as $key=>$edit_value)
                        <form role="form" action="/update-brand-product/{{$edit_value->brand_id}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Brand Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">brand Description</label>
                                <textarea style="resize: none;" rows="5" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Description">{{$edit_value->brand_desc}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-info" name="update_brand_product">Update brand Product</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </section>

    </div>
</div>
@endsection
