@extends('layouts.app')
@section('bar_title')
    الصفحة الرئيسية عام
@endsection
@section('sub-header')
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">لوحة التحكم</h5>
            <!--end::Page Title-->
            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">
            </div>
            <span class="text-muted font-weight-bold mr-4">عام</span>
            <!--end::Actions-->
        </div>
    </div>
@endsection
@section('content')

<div class="container-fluid ml-5">
    <div class="row">
        <form class="col-sm-6 row card" id="form-testimonial">
            {{csrf_field()}}
            <h1 class="col-sm-12 mb-5 mt-5">
                قالوا عنا
            </h1>
        <textarea class="mt-5 col-sm-12 cke_rtl" id="editor2"></textarea>
            <button type="submit" class="btn btn-primary btn-testimonial mt-5 mb-5">
                حفظ
            </button>
        </form>

        <form class="col-sm-5 offset-1   d-flex  flex-column  card" id="form-opening">
            {{csrf_field()}}
            <h1 class="h1 mt-5">
                المواعيد
            </h1>
            <div class="cols-sm-12 row ">
                <div class="form-group col-sm-6 d-flex flex-column">

                    <label for="example-time-input" class=" col-form-label">من الوقت</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="from_time"  type="time" id="example-time-input">
                    </div>
                </div>
                <div class="form-group cols-sm-6 d-flex flex-column">

                    <label for="example-time-input" class=" col-form-label">الى الوقت</label>

                        <input class="form-control" type="time" name="to_time" id="example-time-input-2">
                </div>

            </div>
            <div class="cols-sm-12">
                <label for="" class="form-group mt-5 col-sm-5" style="padding: 0.5em;">
                    <span class="ml-2 ">من اليوم</span>
                    <select id="from_day" class="form-control " name="from_day" >
                        <option value="السبت">السبت</option>
                        <option value="الأحد">الأحد</option>
                        <option value="الإثنين">الإثنين</option>
                        <option value="الثلاثاء">الثلاثاء</option>
                        <option value="الأربعاء">الأربعاء</option>
                        <option value="الخميس">الخميس</option>
                        <option value="الجمعة">الجمعة</option>
                    </select>
                </label>
                <label for="" class="form-group col-sm-5 ml-4">
                    <span class="ml-2 mt-5 mb-3">الى اليوم</span>
                    <select style="padding: 0.5em;" id="to_day" name="to_day" type="text" class="form-control " >
                        <option value="السبت">السبت</option>
                        <option value="الأحد">الأحد</option>
                        <option value="الإثنين">الإثنين</option>
                        <option value="الثلاثاء">الثلاثاء</option>
                        <option value="الأربعاء">الأربعاء</option>
                        <option value="الخميس">الخميس</option>
                        <option value="الجمعة">الجمعة</option>
                    </select>
                </label>
            </div>

            <button class="btn btn-primary btn-appoinments w-50">
                حفظ
            </button>
        </form>
    </div>

</div>
@endsection

@push('js')

    <script>
        CKEDITOR.replace( 'editor2',{
            contentsLangDirection: 'rtl'
        } );

    </script>
    <script>
        $(document).on('click','.btn-testimonial',function (event){
            event.preventDefault()
            let form = document.getElementById('form-testimonial');
            let form_Data = new FormData(form)
            var data = CKEDITOR.instances.editor2.getData()
            form_Data.append('testimonial',data);
            $.ajax({
                url:'/dashboard/general/testimonials/set',
                method:'post',
                data: form_Data,
                success:function (response){
                  if (response.status == 200){
                      Swal.fire(
                          ' تمت العملية بنجاح',
                          '',
                          'success'
                      )
                  }
                  else{
                      Swal.fire(
                          ' تمت العملية بنجاح',
                          '',
                          'error'
                      )
                  }

                },
                contentType: false,
                cache: false,
                processData: false,
            })
        })

    </script>

    <script>
        $.ajax({
            url:'/dashboard/general/testimonials',
            method:'get',
            data: {},
            success:function (response){
                CKEDITOR.instances.editor2.setData(response.data.testimonial)

            }
        })

    </script>

    <script>
        $.ajax({
            url:'/dashboard/general/appoinments',
            method:'get',
            data: {},
            success:function (response){
                $("#from_day").val(response.data.from_day)
                $("#to_day").val(response.data.to_day)
                $("#example-time-input").val(response.data.from_time)
                $("#example-time-input-2").val(response.data.to_time)
            }
        })
        $(document).on('click','.btn-appoinments',function (event){
            event.preventDefault()
            let form = document.getElementById('form-opening');
            let form_Data = new FormData(form)
            $.ajax({
                url:'/dashboard/general/appointments/set',
                method:'post',
                data: form_Data,
                success:function (response){
                    if (response.status == 200){
                        Swal.fire(
                            'تمت العملية بنجاح',
                            '',
                            'success'
                        )
                    }
                    else{
                        Swal.fire(
                            ' حدث خطأ',
                            '',
                            'error'
                        )
                    }
                },
                contentType: false,
                cache: false,
                processData: false,
            })
        })
    </script>
    <script>
        var KTBootstrapTimepicker = function () {

            // Private functions
            var demos = function () {
                // minimum setup
                $('#kt_timepicker_1, #kt_timepicker_1_modal').timepicker();

                // minimum setup
                $('#kt_timepicker_2, #kt_timepicker_2_modal').timepicker({
                    minuteStep: 1,
                    defaultTime: '',
                    showSeconds: true,
                    showMeridian: false,
                    snapToStep: true
                });

                // default time
                $('#kt_timepicker_3, #kt_timepicker_3_modal').timepicker({
                    defaultTime: '11:45:20 AM',
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: true
                });

                // default time
                $('#kt_timepicker_4, #kt_timepicker_4_modal').timepicker({
                    defaultTime: '10:30:20 AM',
                    minuteStep: 1,
                    showSeconds: true,
                    showMeridian: true
                });
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTBootstrapTimepicker.init();
        });
        $('input.timepicker').timepicker({});
    </script>
@endpush
