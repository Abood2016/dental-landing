<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('front.layouts.header-meta')
    <link rel="stylesheet" href="{{asset('/front_assets/css/service.css')}}">
</head>
<style>

</style>
<body>
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{URL::to("/")}}"> <img
                src="{{ URL::asset('/images/logo/'. $setting->logo )}}" class="logo" width="206px" height="63px"
                alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{URL::to('/')}}">
                        <span class="item-itself-nav">الصفحة الرئيسية</span></a>
                </li>

            </ul>
        </div>
        <div class="ml-auto   header-icon-mobile header-icon-content">
            <div class="d-flex flex-row">
                    <span class="icon " style="background-color: #ffffff;color: #18afd3!important;">
                        <span class="fa fa-phone-alt" style="color: #18afd3!important;"></span>
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

 <main>
    <div class="container-fluid service-content">
        <div class="row">
            <div class="col-sm-6 col-12 text-center">
                <img class="service-image" src="{{URL::asset('/images/service/'.$service->image)}}" alt="">
            </div>
            <div class="col-sm-6 col-12 row d-flex flex-column">
            <div class="col-sm-12 title-content-service">
                {{ $service->title }}
            </div>
                <div class="col-sm-12 col-12  text-justify content-contetn-service">
                    {!! $service->description !!}
                </div>
            </div>
        </div>
    </div>
     <br>
     <br>
     <br>
 </main>
<footer class="container-fluid" style="background-color: #18afd3">
    <div class="row">
        <div class="col-sm-5 d-flex justify-content-center footer-logo-mobile" >
            <img src="{{ URL::asset('/images/logo/'. $setting->logo )}}" class="footer-logo" width="206px" height="63px"
                 alt="">
        </div>
        <div class="col-sm-4 all-right d-flex flex-column">
            جميع الحقوق محفوظة.
            <a href="/" class=" col-5 text-center mt-2 link-footer">
                {{date("Y")}}
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
</footer>
@include('front.layouts.footer-meta')
</body>

</html>
