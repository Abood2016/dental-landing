<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('front.layouts.header-meta')
    <style>
        #bg_image::before{
            background-image: url({{ URL::asset('/images/bg_image/'. $setting->bg_image )}});

        }
    </style>
</head>

<body>
<header id="bg_image" class="header-box" style="">
    <div class="container">
        <div class="row nav-container">
            <div class="col-sm-3 col-12">
                <img src="{{ URL::asset('/images/logo/'. $setting->logo )}}" class="logo" width="206px"
                     height="63px" alt="">
            </div>
            <div class="col-sm-9 col-12">
                <div class="float-end header-icon-mobile">
                    <div class="d-flex flex-row">
                            <span class="icon">
                                <span class="fa fa-phone-alt" style="font-weight: 200;"></span>

                            </span>
                        <div class="num-call d-flex flex-column">
                                <span class="contact-number">
                                    {{ $setting->contact_number }}
                                </span>

                        </div>


                    </div>

                </div>
                <a href="{{ $setting->facebook_url }}" class="float-end header-icon-mobile header-icon-facebook">
                    <div class="d-flex flex-row">
                            <span class="icon icon-facebook">
                                <span class="fab fa-facebook-f"  style="font-weight: 200;"></span>

                            </span>
                        <div class="num-call d-flex flex-column">
                                <span class="contact-number">
                                   فيسبوك
                                </span>

                        </div>


                    </div>

                </a>

            </div>
        </div>
        <div class="row header-content">
            <div class="col-sm-8 header-content-word" data-aos="fade-left" data-aos-easing="linear"
                 data-aos-duration="1200">
                {{$setting->sub_title}}
            </div>
            <div class="col-sm-4 d-flex flex-column card-header-box" data-aos-easing="linear"
                 data-aos-duration="1200" data-aos="zoom-out">
                <div class=" free-consult" style="height: 3px!important;">
                    احجز الآن
                </div>
                <form id="form_appoinments" class="mt-5  form-consult"> <label for="email"
                                                                               class="form-group d-flex flex-column">
                            <span class="text-white input-label">
                                الاسم
                            </span>
                        <input name="name" placeholder="ادخل اسم الشخص المراد الحجز له" id="name" type="text"
                               class="form-control mt-2">
                        <small id="name_error" class="text-danger badge badge-danger text-start"></small>
                    </label>
                    <label class="form-group d-flex flex-column mt-2">
                            <span class="text-white input-label">
                                رقم الجوال
                            </span>
                        <input name="phone" placeholder="ادخل رقم الجوال" type="text" class="form-control mt-2">
                        <small id="phone_error" class="text-danger badge badge-danger text-start"></small>
                    </label>
                    <label class="form-group d-flex flex-column mt-2">
                            <span class="text-white input-label">
                                الفرع
                            </span>
                        <select name="branch_id" class="form-select mt-2">
                            <option selected disabled>اختيار الفرع</option>
                            @foreach($result as $r)
                                <option value="{{$r->id}}">{{$r->branchName}}</option>
                            @endforeach
                        </select>
                        <small id="branch_id_error" class="text-danger badge badge-danger text-start"></small>
                    </label>
                    <label class="form-group d-flex flex-column mt-2">
                            <span class="text-white input-label">
                                تاريخ الحجز
                            </span>
                        <input name="reserve_date" class="form-control mt-2 text-start" type="date" id="date-input">
                        <small class="text-danger badge badge-danger text-start" id="reserve_date_error"></small>
                    </label>
                    <label for="email" class="form-group d-flex flex-column mt-3">
                            <span class="text-white input-label">
                                طبيعة الاستشارة
                            </span>
                        <textarea name="consultation" rows="2" type="text" class="form-control mt-2"></textarea>
                        <small class="text-danger badge badge-danger text-start" id="consultation_error"></small>
                    </label>
                    <button class="button-card btn btn-primary mb-4 mt-4" id="reserve-appoinments">
                        احجز الآن
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

    <main>
        <div class="container">
            <div class="row about-box" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1000">
                <div class="col-sm-12 d-flex flex-column">
                    <div class="about-title">
                        قالوا عنا
                    </div>
                    <hr class="divider">
                    <p class="about-para">
                    @isset($testimonial->testimonial)
                     {!! $testimonial->testimonial !!}
                    @endisset

                    </p>
                </div>
            </div>
        </div>
        <div class="container services-box" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">
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
                    @isset($services)
                    @foreach ($services as $service)
                    <div class="col-sm-4 col-12 d-flex justify-content-center service-out">
                        <div class="col-sm-10 d-flex flex-column">
                            <img src="{{ URL::asset('/images/service/'.$service->image) }}" width="320" height="320" style="border-radius: 10px"
                                alt="service photo">
                            <a href="{{ route('service.show',['id' => $service->id]) }}" class="service-button btn hvr-bounce-to-right">
                                {{ $service->title }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endisset

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
                    <div class="col-sm-5 d-flex flex-row" data-aos="fade-left" data-aos-duration="1000">
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
                                    من {{ $hoursDaily->from_day }} - الى {{ $hoursDaily->to_day }}
                                </div>
                                <div class="col-sm-5 col-5 text-start general-text" style="font-family: Droid-kofi">
                                    {{ \Carbon\Carbon::parse($hoursDaily->from_time)->format('h:i')}} -
                                    {{ \Carbon\Carbon::parse($hoursDaily->to_time)->format('h:i')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 d-flex flex-row mobile-edition " data-aos="fade-right" data-aos-offset="100"
                        data-aos-duration="1000">
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
                                    style="text-decoration: none">{{ $setting->emergency_contact_number }}</a>
                            </div>
                            <div class="col-sm-12 text-start our-accounts">
                                حسابنا على فيسبوك
                            </div>

                            <a href="{{ $setting->facebook_url }}" class=" social-icon social-icon-general">
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
        @include('front.layouts.footer')
    </footer>

    @include('front.layouts.footer-meta')
    <script>
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
    <script>
        $(document).on('click',"#reserve-appoinments",function (event){
            event.preventDefault()
            let form_appoinments = document.getElementById('form_appoinments')
            let form_Data = new FormData(form_appoinments)
            $('#name_error').text("");
            $('#phone_error').text("");
            $('#branch_id_error').text("");
            $('#reserve_date_error').text("");
            $('#consultation_error').text("");
            $.ajax({
                url:'/appoinments/set',
                method:'post',
                data:form_Data,
                success:function (response){
                if (response.status == 200){

                    Swal.fire({

                        icon: 'success',
                        title: 'تم حجز الموعد بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#form_appoinments").trigger("reset");

                }else {
                    Swal.fire({

                        icon: 'error',
                        title: 'حدث خطأ ما',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                },
                error:function (reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]); //# معناها اختار لي اسم الايررور
                    });
                },
                contentType: false,
                cache: false,
                processData: false,

            })
        })
    </script>
</body>

</html>
