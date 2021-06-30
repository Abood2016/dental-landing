<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('front.layouts.header-meta')
</head>

<body>
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{URL::to("/")}}"> <img
                    src="{{ URL::asset('/images/logo/'. $setting->logo )}}" class="logo" width="206px" height="63px"
                    alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{URL::to('/')}}"> <span
                                style="margin-left: 0.3em;margin-top: 0.4em">الرجوع</span><span
                                class="fas fa-chevron-circle-left"></span></a>
                    </li>

                </ul>
            </div>
            <div class="ml-auto   header-icon-mobile header-icon-content">
                <div class="d-flex flex-row">
                    <span class="icon bg-light" style="color: #18afd3">
                        <span class="fa fa-phone-alt" style="font-weight: 200;"></span>
                    </span>
                    <div class="num-call d-flex flex-column">
                        <span class="contact-number">
                            {{ $setting->contact_number }}
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </nav>

<div class="row" data-aos="fade-left" data-aos-duration="1200" data-aos-offset="0">
    <div class="col-sm-5 d-flex justify-content-center footer-logo-mobile">
        <img src="{{ URL::asset('/images/logo/'. $setting->logo )}}" class="footer-logo" width="206px" height="63px"
            alt="">
    </div>
    <div class="col-sm-4 all-right d-flex flex-column">
        جميع الحقوق محفوظة.
        <a href="/" class=" col-5 text-center mt-2 link-footer">
            لدى G.M.G
        </a>
    </div>
    <div class="col-sm-3 d-flex flex-row pt-4 pb-4 mr">
        <a href="{{ $setting->facebook_url }}" style="" class="social-icon">
            <span class="fab fa-facebook-f social-itself">
            </span>
        </a>
        <a href="{{ $setting->twitter_url}}" style="" class="social-icon">
            <span class="fab fa-twitter social-itself">
            </span>
        </a>
        <a href="{{ $setting->instagram_url }}" style="" class="social-icon">
            <span class="fab fa-instagram social-itself">
            </span>
        </a>
    </div>
</div>
</body>

</html>