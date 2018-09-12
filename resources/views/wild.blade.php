<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wild Tech Solution | Store</title>

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
<body>
<div class="flex-center position-ref full-height">
    <div>
        <h1></h1><a style="padding-bottom: 10px" href="/"> <img src="{{asset('img/logo.png')}}" class="img-fluid"
                                                        width="300px" height="000">
        </a></div>
    <br>
    <br>
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
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('img/1.jpg')}}" height="450px" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('img/2.jpg')}}" height="450px" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('img/3.jpg')}}" height="450px" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<hr width="90%">
<div class="center">
    <h2>
        HOME
    </h2>

    @include('partials.session')
    @include('partials.error')
    @include('partials.info')
</div>
<br>
<div class="row flex-center" style="padding-right:20px; padding-left: 20px; ">

    @foreach($shopping_items as $shopping_item)
        <div class="col-sm-4">
            <div class="card card-default card-body card-hover shadow-1" style="margin-bottom: 15px;">
                @foreach($shopping_item->getMedia('products') as $media)
                    <img src="{{ "http://localhost:8001/storage/$media->id/$media->file_name" }}" width="50px" height="50px">
                @endforeach
                <br>
                <h5 class="left"><a href="{{url('/cart/item/'.$shopping_item->id)}}">{{$shopping_item->name}}</a></h5>
                <p class="right blue-text">${{$shopping_item->price}}</p>
                <a href="{{url('/cart/item/'.$shopping_item->id)}}" class="btn blue white-text">
                    Add to Cart
                </a>
            </div>
        </div>


    @endforeach

</div>
<br>


<div class="flex-center" style="margin-bottom: 10px">
    <img src="{{asset('img/payment_types_badge1.png')}}" alt="Payments">
</div>

@include('partials.footer')




</body>

</html>
