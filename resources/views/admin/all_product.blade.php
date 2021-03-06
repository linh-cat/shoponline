@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <?php
        $message = Session::get('message');
        if($message){
        echo '<p class="alert alert-success">' . $message ."</p>";
            Session::put('message', null);
        }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            List Product
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="/search-product" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search" name="search_product">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit">Go!</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Name Product</th>
              <th>Display</th>
              <th>Image</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Price</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>

                @foreach ($all_product as $key => $pro)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{$pro->product_name}}</td>
                    <td>
                        <?php
                            if ($pro->product_status == 0) {
                        ?>
                            <a href="/active-product/{{$pro->product_id}}" ><span class="fa fa-thumbs-down fa-thumb-styling" style="color: red;font-size: 25px;"> </span></a>
                        <?php
                            }else {
                        ?>
                            <a href="/unactive-product/{{$pro->product_id}}"><span class="fa fa-thumbs-up fa-thumb-styling" style="color: green;font-size: 25px;"></span></a>
                        <?php
                            }
                        ?>
                    </td>
                    <td><img src="public/uploads/product/{{$pro->product_image}}" alt="pro"></td>
                    <td>{{$pro->brand_name}}</td>
                    <td>{{$pro->category_name}}</td>
                    <td>{{$pro->product_price}}</td>
                    <td>
                        <a href="/edit-product/{{$pro->product_id}}" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a href="/delete-product/{{$pro->product_id}}"  onclick="return confirm('are you sure delete?')">
                            <i class="fa fa-times text-danger text"></i></a>
                        </a>
                    </td>
                </tr>
                @endforeach

          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">

          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">
            {{$all_product->links()}}
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
