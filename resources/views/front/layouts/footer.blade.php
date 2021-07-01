
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
