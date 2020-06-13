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
            List Brand Product
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
            <div class="input-group">
            </div>
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
              <th>Name Brand Product</th>
              <th>Display</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>

                @foreach ($all_brand_product as $key => $brand_pro)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{$brand_pro->brand_name}}</td>
                    <td>
                        <?php
                            if ($brand_pro->brand_status ==0) {
                        ?>
                            <a href="/active-brand-product/{{$brand_pro->brand_id}}" ><span class="fa fa-thumbs-down fa-thumb-styling" style="color: red;font-size: 25px;"> </span></a>
                        <?php
                            }else {
                        ?>
                            <a href="/unactive-brand-product/{{$brand_pro->brand_id}}"><span class="fa fa-thumbs-up fa-thumb-styling" style="color: green;font-size: 25px;"></span></a>
                        <?php
                            }
                        ?>
                    </td>
                    <td>
                        <a href="/edit-brand-product/{{$brand_pro->brand_id}}" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a href="/delete-brand-product/{{$brand_pro->brand_id}}"  onclick="return confirm('are you sure delete?')">
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
          </div>
          <div class="col-sm-7 text-right text-center-xs">
              {{$all_brand_product->links()}}
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
