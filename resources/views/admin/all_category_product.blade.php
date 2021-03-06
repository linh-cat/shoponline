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
            List Category Product
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
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
              <th>Name Category</th>
              <th>Display</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>

                @foreach ($all_category_product as $key => $cate_pro)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{$cate_pro->category_name}}</td>
                    <td>
                        <?php
                            if ($cate_pro->category_status ==0) {
                        ?>
                            <a href="/active-category-product/{{$cate_pro->category_id}}" ><span class="fa fa-thumbs-down fa-thumb-styling" style="color: red;font-size: 25px;"> </span></a>
                        <?php
                            }else {
                        ?>
                            <a href="/unactive-category-product/{{$cate_pro->category_id}}"><span class="fa fa-thumbs-up fa-thumb-styling" style="color: green;font-size: 25px;"></span></a>
                        <?php
                            }
                        ?>


                    </td>
                    <td>
                        <a href="/edit-category-product/{{$cate_pro->category_id}}" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a href="/delete-category-product/{{$cate_pro->category_id}}"  onclick="return confirm('are you sure delete?')">
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
            {{$all_category_product->links()}}
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
