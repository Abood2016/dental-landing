<!doctype html>
<html lang="ar" dir="rtl">

<head>
  @include('front.layouts.header-meta')
</head>

<body>
  <header class="header-box" style="">
    <div class="container">
        <div class="row nav-container">
            <div class="col-sm-3 col-12">
                <img src="{{ asset('front_assets/images/logo.png') }}" class="logo" width="206px" height="63px" alt="">
            </div>
            <div class="col-sm-9 col-12">

                <div class="float-end header-icon-mobile">
                    <div class="d-flex flex-row">
                        <span class="icon">
                            <span class="fa fa-phone-alt" style="font-weight: 200;"></span>
                        </span>
                        <div class="num-call d-flex flex-column">
                            <span>
                                1-800-1234-567
                            </span>
                            <span>
                                1-800-1234-567
                            </span>
                        </div>


                    </div>

                </div>

            </div>
        </div>
        <div class="row header-content">
            <div class="col-sm-8 header-content-word" data-aos="fade-left" data-aos-easing="linear"
                data-aos-duration="1200">
                جودة طبية فائقة بالإضافة الى عناية صحية وسرعة وثقة عالية
            </div>
            <div class="col-sm-4 d-flex flex-column card-header-box" data-aos-easing="linear" data-aos-duration="1200"
                data-aos="zoom-out">
                <div class=" free-consult" style="height: 3px!important;">
                    احجز الآن
                </div>
                <form action="" class="mt-5  form-consult">
                    <label for="email" class="form-group d-flex flex-column">
                        <span class="text-white input-label">
                            الاسم
                        </span>
                        <input placeholder="ادخل اسم الشخص المراد الحجز له" id="name" type="text"
                            class="form-control mt-2">
                    </label>
                    <label class="form-group d-flex flex-column mt-2">
                        <span class="text-white input-label">
                            رقم الجوال
                        </span>
                        <input placeholder="ادخل رقم الجوال" type="text" class="form-control mt-2">
                    </label>
                    <label class="form-group d-flex flex-column mt-2">
                        <span class="text-white input-label">
                            الفرع
                        </span>
                        <select class="form-control mt-2">
                            <option selected disabled>حدد الفرع</option>
                            <option value="">جباليا</option>
                            <option value="">جباليا</option>
                            <option value="">جباليا</option>
                            <option value="">جباليا</option>
                            <option value="">جباليا</option>
                            <option value="">جباليا</option>
                        </select>
                    </label>
                    <label class="form-group d-flex flex-column mt-2">
                        <span class="text-white input-label">
                            تاريخ الحجز
                        </span>
                        <input id="datepicker" type="text" class="form-control mt-2">
                    </label>
                    <label for="email" class="form-group d-flex flex-column mt-3">
                        <span class="text-white input-label">
                            طبيعة الاستشارة
                        </span>
                        <textarea rows="2" type="text" class="form-control mt-2 mb-4"></textarea>
                    </label>
                    <button class="button-card btn btn-primary mb-4">
                        احجز الآن
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
    <main>
        <div class="container">
            <div class="row about-box" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="800">
                <div class="col-sm-12 d-flex flex-column">
                    <div class="about-title">
                        قالوا عنا
                    </div>
                    <hr class="divider">
                    <p class="about-para">
                        نحن عيادة أسنان تركز على الأسرة ، تأسست في عام 1997 مع التركيز القوي على الرعاية الوقائية وطب
                        الأسنان العام لمساعدتك أنت وعائلتك على تحقيق ابتسامة صحية والحفاظ عليها مدى الحياة. أثناء
                        استشارتك ، نود أن نأخذ الوقت الكافي لمناقشة جميع الخيارات المتاحة معك لحل مشاكل الأسنان الخاصة
                        بك حتى نتمكن من توفير العلاج الأنسب لك. نحن ملتزمون بحضور دورات وندوات التعليم المستمر التي تغطي
                        جميع مجالات طب الأسنان من أجل ضمان حصول جميع المرضى على أفضل وأحدث العلاجات المتاحة.
                    </p>
                </div>
            </div>
        </div>
        <div class="container services-box" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="800">
            <div class="row">
                <div class="col-sm-12 text-center services-title">
                    خدماتنا
                </div>
                <div class="col-sm-12 d-flex justify-content-center">
                    <hr class="divider ">
                </div>
                <div class="col-sm-12 text-center small">
                    نحن نقدم خدمات رعاية صحية عالية الجودة لجميع أفراد الأسرة.
                </div>
                <div class="col-sm-12 row mt-5 mobile-service">
                    <div class="col-sm-4 col-12 d-flex justify-content-center service-out">
                        <div class="col-sm-10 d-flex flex-column">
                            <img src="{{ asset('front_assets/images/service_one.jpg') }}" width="320" height="320" alt="service photo">
                            <a href="index.html" class="service-button btn hvr-bounce-to-right">
                                عناية عامة
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 d-flex justify-content-center service-out">
                        <div class="col-sm-10  d-flex flex-column">
                            <img src="{{ asset('front_assets/images/service_two.jpg') }}" width="320" height="320" alt="service photo">
                            <a href="index.html" class="service-button btn hvr-bounce-to-right">
                                طب الأسنان التجميلية
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12 d-flex justify-content-center service-out">
                        <div class="col-sm-10 d-flex flex-column">
                            <img src="{{ asset('front_assets/images/service_three.jpg') }}" width="320" height="320" alt="service photo">
                            <a href="index.html" class="service-button btn hvr-bounce-to-right">
                                طب الأسنان الترميمي
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center more-box more-box-above">
                <button class="btn btn-ellipse">
                    المزيد
                </button>
            </div>
        </div>

        <div class="container-fluid ">
            <div class="row box-img-help">
                <div class="col-sm-12 text-center how-we-can " data-aos="fade-left" data-aos-easing="linear"
                    data-aos-duration="800">
                    كيف يمكننا مساعدتك؟
                </div>
                <div class="col-sm-12 text-center how-we-can-capture" data-aos="fade-left" data-aos-easing="linear"
                    data-aos-duration="800">
                    <small class="">
                        نقدم مجموعة كبيرة من الإجراءات لمساعدتك في الحصول على الابتسامة المثالية
                    </small>
                </div>
                <div style="position:relative;z-index: 3" class="row justify-content-center more-box pb-4"
                    data-aos="fade-left" data-aos-easing="linear" data-aos-duration="800">
                    <button class="btn btn-ellipse btn-elipse-mobile" style="position: relative;z-index: 2">
                        احجز الآن
                    </button>
                </div>
            </div>
        </div>

        <div class="container general-box">
            <div class="row">
                <div class="col-sm-12 row justify-content-center">
                    <div class="col-sm-5 d-flex flex-row" data-aos="fade-left" data-aos-duration="800">
                        <div class="box-one-general" style="">
                            <div class="right-box-general" style="">
                                ساعات الدوام
                            </div>
                        </div>

                        <div class="row d-flex flex-column pb-5" style="background: #F1F3F9; width: 80%">
                            <span class=" mt-4">
                                <span class="far fa-calendar-alt general-icon"></span>
                            </span>
                            <div class="col-sm-12 col-12 row sat-to-thurs">
                                <div class="col-sm-7 col-7 text-start" style="font-family: Droid-kofi">
                                    السبت- الخميس
                                </div>
                                <div class="col-sm-5 col-5 text-start general-text" style="font-family: Droid-kofi">
                                    12:00م-8م
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 d-flex flex-row mobile-edition " data-aos="fade-right" data-aos-offset="100"
                        data-aos-duration="800">
                        <div class="box-one-general" style="">
                            <div class="right-box-general" style="">
                                للطوارىء
                            </div>
                        </div>
                        <div class="row d-flex flex-column pb-5 " style="background: #F1F3F9; width: 80%">
                            <div class="col-sm-12 mt-4">
                                <span class="fas fa-heart general-icon heart-icon"></span>
                            </div>
                            <div class="col-sm-12 text-start sat-to-thurs"
                                style="font-family: Droid-kofi; margin-top: 3em;font-size: 1.2em;text-transform: none;text-decoration: none!important;">
                                <a class="emergency-num" href="tel:1-800-1234-567"
                                    style="text-decoration: none">1-800-1234-567</a>
                            </div>
                            <div class="col-sm-12 text-start our-accounts">
                                حسابنا على فيسبوك
                            </div>

                            <a href="index.html" class=" social-icon social-icon-general">
                                <span class="fab fa-facebook-f  social-itself">

                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
    <footer class="container-fluid" style="background-color: #18afd3">
        <div class="row" data-aos="fade-left" data-aos-duration="1000" data-aos-offset="0">
            <div class="col-sm-5 d-flex justify-content-center footer-logo-mobile">
                <img src="{{ asset('front_assets/images/logo.png') }}" class="footer-logo" width="206px" height="63px" alt="">
            </div>
            <div class="col-sm-4 all-right d-flex flex-column">
                جميع الحقوق محفوظة.
                <a href="/" class=" col-5 text-center mt-2 link-footer">
                    لدى G.M.G
                </a>
            </div>
            <div class="col-sm-3 d-flex flex-row pt-4 pb-4 mr">
                <span style="" class="social-icon">
                    <span class="fab fa-facebook-f social-itself">
                    </span>
                </span>
                <span style="" class="social-icon">
                    <span class="fab fa-twitter social-itself">
                    </span>
                </span>
                <span style="" class="social-icon">
                    <span class="fab fa-instagram social-itself">
                    </span>
                </span>
            </div>
        </div>
    </footer>

    @include('front.layouts.footer-meta')
</body>

</html>