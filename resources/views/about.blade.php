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

        .flexbox-container {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: flex-end;
            justify-content: center;
        }

        .filled-with-image {
            width: 100%;
            height: 250px;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            background: url('../img/add-pills.jpg') no-repeat center;

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


<hr width="90%">
<div class="center">

    <div class="flexbox-container">
        <div class="filled-with-image">

        </div>
    </div>

    <br><br>


    @include('partials.session')
    @include('partials.error')
    @include('partials.info')
</div>
<br>

<div class="container">
    <h2 class="center">
        ABOUT US
    </h2>
    <hr width="90%">
    <div class="row">
        <div class="col-lg-6 col-sm-12" style="text-align: justify; font-family: CamptonLight">
            Evolution Pharmacy is a locally owned and managed pharmacy
            which has been since operating from a High density Suburb
            located in Harare since 2015 . Chief amongst of business
            objectives is to improve access to quality and affordable
            medicines and healthcare to our community and nation at large .
            To this end we have a dedicated and well trained staff who
            specializes in serving our community with fast, friendly, professional
            service and the highest-quality medicines and health products. You’ll
            always work with somebody at our pharmacy who greets you with a
            warm welcoming smile, and our pharmacists take the time to counsel
            you and answer your questions. We accept most of the major
            insurances which include PSMAS , CIMAS , First Mutual , Cellmed
            Health, Altfin , Liberty Health to name but a few .
            Visit us for all your healthcare needs!
        </div>
        <div class="col-lg-6 col-sm-12">
            <img src="{{asset('img/lady.jpg')}}" alt="img" width="105%">
        </div>
    </div>


</div>
<br>

<div class="container">
    <h2 class="center">
        SERVICES
    </h2>
    <hr width="90%">

    <div style="text-align: justify; font-family: CamptonLight">
        We specialize in providing quality healthcare services
        to all our customers, with a special emphasis
        on helping to manage chronic conditions or complex medication therapies. Among our specialized
        services, we offer:
        <ul>
            <li> Medication reviews
            </li>
            <li> Diabetes products and services
            </li>
            <li> Email and text message refill reminders
            </li>
            <li> Script Refills via phone , email and online
            </li>
            <li> Email and text message refill reminders Compounding
            </li>
            <li> Diabetes , Hypertension and Diet Consulting
            </li>
            <li> Importation of Specialist Medicines
            </li>
            <li> Immunisation and Vaccinations****
            </li>
            <li> Freight Delivery of Medicines all over Zimbabwe
            </li>
            <li>Free delivery within the Kuwadzana, Crowborough,
                Dzivarasekwa,Tynwald and Harare City Limits (T's and C's Apply)
            </li>
        </ul>
    </div>

</div>
<br>

<div class="container">
    <h2 class="center">
        PRODUCTS & SPECIALTIES
    </h2>
    <hr width="90%">
    <div class="row">

        <div class="col-lg-6 col-sm-12">
            <img src="{{asset('img/more-pills.jpg')}}" width="95%" alt="img">
        </div>

        <div class="col-lg-6 col-sm-12" style="text-align: justify; font-family: CamptonLight">
            Our first priority is helping you manage your health. We
            are a full-service pharmacy offering one-
            stop convenience, a broad range of quality healthcare products, and personal, professional
            services.
            <ul>
                <li> Broad availability of brand and generic prescription medications
                </li>
                <li>Private-label, over-the-counter medications</li>
                <li> Pharmacist counseling
                </li>
                <li>Free, convenient home delivery</li>
                <li>Bathroom Aids</li>
                <li>Candy</li>
                <li>Canes & Walkers</li>
                <li> Diabetic Supplies
                </li>
                <li> Gifts & Novelties
                </li>
                <li> Greeting Cards
                </li>
                <li> Medical Supplies
                </li>
                <li>Personal hygiene products</li>
                <li>Prescribe medicines for Over the Counter conditions</li>
            </ul>
        </div>
    </div>
</div>

@include('partials.footer')


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
