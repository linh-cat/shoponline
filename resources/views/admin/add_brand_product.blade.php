@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Brand Product
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
                        <form role="form" action="/save-brand-product" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Name</label>
                                <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Brand Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand Description</label>
                                <textarea style="resize: none;" rows="5" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Display</label>
                                <select class="form-control input-sm m-bot15 mt-5" name="brand_product_status">
                                    <option value="1">Block</option>
                                    <option value="0">None</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info" name="add_brand_product">Add Category Product</button>
                        </form>
                    </div>
                </div>
            </section>

    </div>
</div>
@endsection
