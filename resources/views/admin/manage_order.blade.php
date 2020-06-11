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
            List Order
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
              <th>Name</th>
              <th>Total Money</th>
              <th>Status</th>
              <th>Display</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>

                @foreach ($all_order as $key => $order)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->order_total}}</td>
                    <td>{{$order->order_status}}</td>
                    <td>
                        <a href="/view-order/{{$order->order_id}}" ui-toggle-class="">
                            <i class="fa fa-pencil-square-o text-success text-active"></i>
                        </a>
                        <a href="/delete-order/{{$order->order_id}}"  onclick="return confirm('are you sure delete?')">
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
          <div class="col-sm-7 text-right text-center-xs">

          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection
