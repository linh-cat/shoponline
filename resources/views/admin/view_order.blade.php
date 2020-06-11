@extends('admin_layout')
@section('admin_content')

<br>
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
            Infor Customer
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
                    <th>Phone</th>
                    <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($view_order as $item)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$item->customer_name}}</td>
                        <td>{{$item->customer_phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
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
            Infor Shipping
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
                    <th>Shipper name</th>
                    <th>Address</th>
                    <th>phone</th>
                    <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($view_order as $item)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$item->shipping_name}}</td>
                        <td>{{$item->shipping_address}}</td>
                        <td>{{$item->shipping_phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
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
            List Detail Order
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
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($view_order as $item)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->product_sales_quantity}}</td>
                        <td>{{$item->product_price}}</td>
                        <td>{{$item->product_price*$item->product_sales_quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
