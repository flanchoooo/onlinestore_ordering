<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ORDERING</title>

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
        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .top-right {
            position: absolute;
            right: 10px;
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


        footer {
            position:absolute;
            bottom:0;
            width:100%;
        }
    </style>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/bs-enhance/bs-enhance.min.css') }}" rel="stylesheet">
    <script src="{{ asset('dist/js/app.js') }}"></script>

</head>
<body>
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

    {{--
        <div class="content">
            <center><img src="{{asset('css/social-icons/online-order.svg')}}" alt="clipboard" width="100%">
            </center>

        </div>
    --}}


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
            <img class="d-block w-100" src="{{asset('img/pharm3.jpg')}}" height="450px" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('img/pharm2.jpg')}}" height="450px" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('img/diempprod.jpg')}}" height="450px" alt="Third slide">
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
        {{$header}}
    </h2>
</div>
<br>
<div class="row flex-center" style="padding-right:20px; padding-left: 20px; ">

    @foreach($shopping_items as $shopping_item)
        <div class="col-sm-4">
            <div class="card card-default card-body card-hover shadow-1" style="margin-bottom: 15px;">
                @foreach($shopping_item->getMedia('products') as $media)
                    <img src="http://localhost:8000{{ $media->getUrl() }}" width="50px" height="50px">
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
