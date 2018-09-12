<nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light shadow-1" style="margin-top: 2vh;">
    <button style="border: none" class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle blue-text" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Printers
                </a>
                <div class="dropdown-menu mega-menu card-dropdown" aria-labelledby="navbarDropdown">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="blue-grey-text" style="font-weight: bolder;">
                               Counter Top Printers
                            </h3>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-3" style="border-left: 1px #FFA500 solid;">
                            <p class="grey-text"><u>Browse By Category</u></p>
                            <p><a href="#">MX I</a></p>
                            <p><a href="#">MX II</a></p>
                            <p><a href="#">MX III</a></p>
                            <p><a href="#">MX IV</a></p>

                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle blue-text" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Tills
                </a>
                <div class="dropdown-menu mega-menu card-dropdown" aria-labelledby="navbarDropdown">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="blue-grey-text" style="font-weight: bolder">
                                Tills </h3>
                        </div>
                        <div class="col-md-3" style="border-left: 1px #FFA500 solid;">
                            <p class="grey-text"><u>Browse By Category</u></p>
                            <p><a href="#">MT TILLS 100X</a></p>
                            <p><a href="#">MT TILLS 200X</a></p>
                            <p><a href="#">MT TILLS 300X</a></p>

                        </div>


                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle blue-text" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                   Servers
                </a>
                <div class="dropdown-menu mega-menu card-dropdown" aria-labelledby="navbarDropdown">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="blue-grey-text" style="font-weight: bolder;;">
                              Server
                            </h3>
                        </div>
                        <div class="col-md-4" style="border-left: 1px #FFA500 solid;">
                            <p class="grey-text"><u>Browse By Category</u></p>
                            <p><a href="#">MT TILLS 100X</a></p>
                            <p><a href="#">MT TILLS 200X</a></p>
                            <p><a href="#">MT TILLS 300X</a></p>
                        </div>

                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle blue-text" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                  Software Solutions
                </a>
                <div class="dropdown-menu mega-menu card-dropdown" aria-labelledby="navbarDropdown">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="blue-grey-text" style="font-weight: bolder;">
                                Software Solutions
                            </h3>
                        </div>
                        <div class="col-md-4" style="border-left: 1px #FFA500 solid;">
                            <p class="grey-text"><u>Browse By Category</u></p>
                            <p><a href="#">Medis</a></p>
                            <p><a href="#">Medis Elite</a></p>
                            <p><a href="#">OptiLife</a></p>
                            <p><a href="#">Propharm</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-submit my-2 my-sm-0" href="{{url('/my-cart')}}">My Cart ({{\Gloudemans\Shoppingcart\Facades\Cart::count()}}) <i
                        class="fa fa-shopping-cart"></i></a>
        </form>
    </div>
</nav>
