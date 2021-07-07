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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="col-sm-6 col-12 text-center d-flex flex-column">
                    <div class="col-12 text-center">
                        <img class="service-image" src="{{URL::asset('/images/service/'.$service->image)}}" alt="">
                    </div>
                    <div class="col-12 justify-content-center mt-4">
                        <button style="background-color: #18afd3;border-color: #18afd3;" class="btn btn-primary  w-25" id="modal-btn">حجز الخدمة</button>
                    </div>
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
        <div class="modal fade" id="ServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #18afd3">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: white">حجز الخدمة</h5>
                        <button type="button" class="btn-close" style="color: white !important" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form_appoinments" class=" form-consult"> <label for="email"
                                class="form-group d-flex flex-column">
                                <span class="text-white input-label">
                                    الاسم
                                </span>
                                <input type="hidden"  id="service_id" name="service_id" value="{{ $service->id }}" />
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
                                <input name="reserve_date" class="form-control mt-2 text-start" type="date"
                                    id="date-input">
                                <small class="text-danger badge badge-danger text-start"
                                    id="reserve_date_error"></small>
                            </label>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="button" id= "btnsave" class="btn btn-primary">حجز</button>
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
            <div class="col-sm-5 d-flex justify-content-center footer-logo-mobile">
                <img src="{{ URL::asset('/images/logo/'. $setting->logo )}}" class="footer-logo" width="206px"
                    height="63px" alt="">
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

    <script>
        $(document).on('click','#modal-btn',function() {
            $('#ServiceModal').modal('show');
        });
    </script>
    <script>
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
    </script>
    <script>
        $(document).on('click',"#btnsave",function (event){
                event.preventDefault()
                let form_appoinments = document.getElementById('form_appoinments')
                let form_Data = new FormData(form_appoinments)
                $('#name_error').text("");
                $('#phone_error').text("");
                $('#branch_id_error').text("");
                $('#reserve_date_error').text("");
                $.ajax({
                    url:'/appoinments/service/set',
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
