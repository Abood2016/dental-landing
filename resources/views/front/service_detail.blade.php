<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('front.layouts.header-meta')
    <link rel="stylesheet" href="{{asset('/front_assets/css/service.css')}}">
</head>
<style>

</style>
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

 </main>
<footer class="container-fluid" style="background-color: #18afd3">
    @include('front.layouts.footer')
</footer>

</body>

</html>
