<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evolution Pharmacy</title>

    <!-- Fonts -->

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 9vh;
            position: fixed;
            display: block;

        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        footer {
            position:absolute;
            bottom:0;
            width:100%;
        }

        @media (max-width: 600px) {
            .top-right {
                display: none;
            }

        }
    </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/bs-enhance/bs-enhance.min.css') }}" rel="stylesheet">
    <script src="{{ asset('dist/js/app.js') }}"></script>

</head>
<body ng-app="menuApp" ng-controller="checkoutCtrl">
<div class="flex-center position-ref full-height">
    <div class="top-left">
        <a style="padding-bottom: 10px" href="/"> <img src="{{asset('img/logo_evolution.png')}}" class="img-fluid"
                                                       alt="logo" width="300px">
        </a></div>

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a class="btn" href="{{ url('/home') }}">Home</a>
            @else
                <a class="btn btn-link white blue-text" href="{{ route('login') }}">Login</a>
                <a class="btn btn-link white blue-text" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif


</div>
<span class="price"></span>
@include('partials.nav')

<div class="white">


    <br>
    <h1 class="flex-center blue-text" style="font-family: CamptonLight !important;">
        CHECKOUT
    </h1>
    <div class="container">
        @include('partials.session')
        @include('partials.error')
        @include('partials.info')
        <br>
        <hr>
        <h2 class="blue-text">
            Customer & Delivery Details
        </h2>
        <br>
        <div>
            <form method="post" id="checkout" action="{{url('/paypal/express')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="name" type="text" placeholder="Name & Surname"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="email" type="email" placeholder="Email Address"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <input id="cell_number" type="text" placeholder="Cellphone Number"
                               class="form-control{{ $errors->has('cell_number') ? ' is-invalid' : '' }}" name="cell_number"
                               value="{{ old('cell_number') }}" required autofocus>

                        @if ($errors->has('cell_number'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cell_number') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                            <textarea placeholder="Delivery Address"
                                      class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                      name="address"
                                      required></textarea>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-12">
                        <select ng-change="update()" id="city"
                                class="select form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                required autofocus name="city" ng-model="city">
                            <option value="" selected>Delivery Town/City</option>
                            <option value="Harare">Harare</option>
                            <option value="Bulawayo">Bulawayo</option>
                            <option value="Chegutu">Chegutu</option>
                            <option value="Kadoma">Kadoma</option>
                            <option value="Kwekwe">Kwekwe</option>
                            <option value="Gweru">Gweru</option>
                        </select>

                        @if ($errors->has('payment_method'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('payment_method') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


        </div>

        <br>
        <hr>
        <div class="left">
            <h2 class="blue-text">
                Cart
            </h2>
        </div>


        <table class="table table-hover table-responsive-sm">
            <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Unit Price
                </th>
                <th>
                    Sub Total
                </th>
                <th>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart_items as $item)
                <tr>
                    <td>
                        {{$item->name}}
                    </td>
                    <td>
                        <input min="0" type="number" name="qty" class="form-control" style="border:none"
                               value="{{$item->qty}}" disabled>

                    </td>
                    <td>
                        <span ng-bind="{{$item->price}} | currency"></span>
                    </td>
                    <td>
                        <span ng-bind="{{$item->price * $item->qty}} | currency"></span></td>
                    <th>
                        <a href="{{url('/cart/remove/'.$item->rowId)}}" class="btn red white-text"><i
                                    class="fa fa-trash"></i></a>
                    </th>
                </tr>

            @endforeach
            <tr>
                <td>
                    Delivery Fee
                </td>
                <td>

                </td>
                <td>
                    <span ng-bind="delivery_fee | currency"></span>
                </td>
                <td>
                    <span ng-bind="delivery_fee | currency"></span>
                </td>
            </tr>
            <tr>
                <th>
                    TOTAL :
                </th>
                <th>

                </th>
                <th>

                </th>
                <th>

                    <span ng-bind="{{$total}} + delivery_fee | currency"></span>
                </th>
            </tr>
            </tbody>
        </table>

        <div  style="margin-bottom: 30px;">
            <p class="left">
                <b><i>NB: YOU WILL BE REDIRECTED TO PAYNOW TO COMPLETE YOU PAYMENT</i></b>
            </p>
            <br>
            <button style="width: 100%; margin-bottom: 50px" type="submit" class="btn green white-text right" name="payment_method" value="paynow">
                MAKE PAYMENT
            </button>
        </div>
        <div class="center">
            or Pay via PayPal
            <br>
            <button type="submit" name="payment_method" value="paypal"><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_200x51.png" alt="PayPal" /></button>
        </div>
        <br>
        </form>

    </div>


</div>



</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5afd445e227d3d7edc2566b6/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</html>
