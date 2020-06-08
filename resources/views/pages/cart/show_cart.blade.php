@extends('welcome')
@section('content')

<section id="cart_items">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Shopping Cart</li>
        </ol>
    </div>
    <div class="table-responsive cart_info">
        <?php
            $content = Cart::content();
        ?>
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Product</td>
                    <td class="description">Description</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($content as $v_content)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{URL::to('public/uploads/product/'. $v_content->image)}}" alt="pro" width="50"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="#">{{$v_content->name}}</a></h4>
                        <p>Web ID: {{$v_content->id}}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{number_format($v_content->price) .' '. 'vnđ'}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <form action="/update-cart-quatity" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" class="form-control">
                                <input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$v_content->qty}}" size="1">
                                <input type="submit" value="update" name="update_qty" class="btn btn-default btn-sm">
                            </form>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">
                            <?php
                                $sub_total = $v_content->price * $v_content->qty;
                                echo number_format($sub_total) . ' ' . 'vnđ';
                            ?>
                        </p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart'. '/'. $v_content->rowId)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <section id="do_action">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{Cart::subtotal().' '. 'VND'}}</span></li>
                        <li>Eco Tax <span>{{Cart::tax().' '. 'VND'}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>{{Cart::total().' '. 'VND'}}</span></li>
                    </ul>
                        <?php
                            $customer_id = Session::get('customer_id');
                            $shipping_id = Session::get('Shipping_id');
                            if ($customer_id !=Null) {
                                echo '<a class="btn btn-default update" href="/checkout">Check Out</a>';
                            }elseif($customer_id !=Null && $shipping_id !=Null){
                                echo '<a class="btn btn-default update" href="/checkout">Check Out</a>';
                            }else{
                                echo '<a class="btn btn-default update" href="/login-checkout">Check Out</a>';
                            }
                        ?>

                </div>
            </div>
        </div>
    </section>

</section>

@endsection
