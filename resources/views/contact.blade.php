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
            background: url('../img/contact3.jpg') no-repeat center;

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

<h2 class="center">
    CONTACT US
</h2>
<hr width="90%">

<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#information" role="tab"
               aria-controls="information" aria-selected="true">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#use" role="tab" aria-controls="use"
               aria-selected="false">Contact Form</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="locate-tab" data-toggle="tab" href="#locate" role="tab" aria-controls="use"
               aria-selected="false">Locate Us</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent" style="margin-top: 20px">
        <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
            <div class="card-default card-body card-hover shadow-1">
                <h4><i class="fas fa-phone"></i> <a href="tel:0242211024">0242211024</a> , <a href="tel:0242210067">0242210067</a>
                </h4>
            </div>
            <br>
            <div class="card-default card-body card-hover shadow-1">
                <h4><i class="fab fa-whatsapp green-text"></i> <a
                            href="https://api.whatsapp.com/send?phone=263784975542">+263784975542</a></h4>

            </div>
            <br>
            <div class="card-default card-body card-hover shadow-1">
                <h4><i class="far fa-envelope blue-text"></i> <a href="mailto:customer_care@evolutionpharmacy.co.zw">customer_care@evolutionpharmacy.co.zw</a>
                </h4>
            </div>

            <br>
        </div>
        <div class="tab-pane fade" id="use" role="tabpanel" aria-labelledby="use-tab">
            <div class="col-md-12">
                <div class="form-area">
                    <form role="form" method="post" action="{{'/site/feedback'}}">
                        {{csrf_field()}}
                        <br style="clear:both">
                        <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                   placeholder="Mobile Number" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                                   required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="textarea" id="message" placeholder="Message"
                                      maxlength="140" rows="7"></textarea>
                        </div>

                        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="locate" role="tabpanel" aria-labelledby="locate-tab">
            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3798.292414935096!2d30.935130315130365!3d-17.82492198781771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1931a7b419f280cf%3A0x768c3cf7df11ad19!2sEvolution+Pharmacy!5e0!3m2!1sen!2szw!4v1529309950284" width="1110" height="1000" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>


    </div>
    <br><br><br>
</div>


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
