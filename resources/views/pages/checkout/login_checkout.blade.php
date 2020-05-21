@extends('welcome')

@section('content')
<!--form-->
<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <!--login form-->
                <div class="login-form">
                    <h2>Login to your account</h2>
                    <form action="/login-customer" method="post">
                        {{ csrf_field() }}
                        <input type="email" placeholder="Email" name="customer_email"/>
                        <input type="password" placeholder="Password" name="customer_password"/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <!--sign up form-->
                <div class="signup-form">
                    <h2>New User Signup!</h2>
                    <form action="/add-customer" method="POST">
                        {{ csrf_field() }}
                        <input type="text" placeholder="Name" name="customer_name"/>
                        <input type="email" placeholder="Email Address" name="customer_email"/>
                        <input type="password" placeholder="Password" name="customer_password"/>
                        <input type="text" placeholder="Phone" name="customer_phone"/>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection
