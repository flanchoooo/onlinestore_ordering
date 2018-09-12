<!doctype html >
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
<body ng-app="menuApp">
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
<br>
<hr>
<div class="center">
    <h2>
        {{$shopping_item->name}}
    </h2>
</div>
<br>

<div class="col-sm-12" ng-controller="productCtrl">
    <div class="card card-default card-body card-hover shadow-1" style="margin-bottom: 15px;">
        <div class="row">
            <div class="col-sm-4">
                @foreach($shopping_item->getMedia('products') as $media)
                    <img src="http://localhost:8000{{ $media->getUrl() }}" width="200px" height="200px">
                @endforeach
            </div>
            <div class="col-sm-8">

                <h5 class="left">{{$shopping_item->name}}
                    (<span class="blue-text">${{$shopping_item->price}}</span>)

                </h5>
                <br><br>
                <form action="{{url('/cart/add/'.$shopping_item->id)}}" method="post">

                    Quantity:<input min="1" ng-model="qty" type="number"
                                    style="width: 30%" name="qty" id="qty"
                                    class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}"
                                    required autofocus>
                    @if ($errors->has('qty'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                    @endif


                    <br>
                    <h4>
                        <input type="hidden" ng-model="price" value="{{$shopping_item->price}}">

                        Total Price: <span style="font-weight: bolder"
                                           ng-bind="qty * {{$shopping_item->price}} | currency"></span>
                    </h4>
            </div>
        </div>

        <br>

        @csrf
        <button style="width:100%;" type="submit" class="btn blue white-text">
            Add to Cart
        </button>
        </form>
        <br>
        <hr>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#information" role="tab"
                   aria-controls="information" aria-selected="true">Detailed Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#use" role="tab" aria-controls="use"
                   aria-selected="false">How to Use</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ingredients" role="tab"
                   aria-controls="ingredients" aria-selected="false">Ingredients</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" style="margin-top: 20px">
            <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                {{$shopping_item->detailed_information}}
            </div>
            <div class="tab-pane fade" id="use" role="tabpanel" aria-labelledby="use-tab">
                {{$shopping_item->how_to_use}}

            </div>
            <div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
                {{$shopping_item->ingredients}}

            </div>
        </div>

    </div>
</div>


</div>
<br>



</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5afd445e227d3d7edc2566b6/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</html>
