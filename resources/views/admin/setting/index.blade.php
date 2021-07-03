@extends('layouts.app')
@section('bar_title')
الإعدادات العامة
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
        <span class="text-muted font-weight-bold mr-4">الإعدادت</span>
        <!--end::Actions-->
    </div>
</div>
@endsection


@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">الإعدادات
                        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; الإعدادات</span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body table-responsive p-0">
                                <table class="table  table-condensed table-hover text-nowrap table-bordered"
                                    id="settings_datatable">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">العنوان</th>
                                            <th width="14%">رقم التواصل</th>
                                            <th width="13%">اللوجو</th>
                                            <th width="10%">التاريخ</th>
                                            <th width="10%">الإجراء</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Datatable-->
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editSettingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodelHeading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-2">
                <form class="form" id="setting_form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العنوان :</label>
                                    <div class="input-icon input-icon-right">
                                        <input name="title" type="text" id="title" class="form-control"
                                            placeholder="" />
                                    </div>
                                    <input type="hidden" name="setting_id" id="setting_id">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم المتواصل :</label>
                                    <div class="input-icon input-icon-right">
                                        <input name="contact_number" type="text" id="contact_number"
                                            class="form-control" placeholder="" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الأنستقرام :</label>
                                    <div class="input-icon input-icon-right">
                                        <input name="instagram_url" type="text" id="instagram_url" class="form-control"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>التويتر :</label>
                                    <div class="input-icon input-icon-right">
                                        <input name="twitter_url" type="text" id="twitter_url" class="form-control"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الفيسبوك :</label>
                                    <div class="input-icon input-icon-right">
                                        <input name="facebook_url" type="text" id="facebook_url" class="form-control"
                                            placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الطوارئ :</label>
                                    <div class="input-icon input-icon-right">
                                        <input name="emergency_contact_number" type="text" id="emergency_contact_number"
                                            class="form-control" placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>العنوان الرئيسي :</label>
                            <div class="input-icon input-icon-right">
                                <input name="sub_title" type="text" id="sub_title" class="form-control"
                                    placeholder="" />
                            </div>
                        </div>
                        <input type="hidden" name="hidden_image" id="bg_hidden_image">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">اللوجو</label>
                            <div id="thumb-output"></div><br>
                            <input type="file" name="logo" class="form-control-file" id="file-image">
                        </div>
                        <small id="image_error" class="form-text text-danger"></small>
                        <img id="modal-preview" style="border-radius: 10px" src="https://via.placeholder.com/150"
                            alt="Preview" class="form-group" width="100" height="90">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">صورة الخلفية الرئيسية</label>
                            <div id="thumb-output"></div><br>
                            <input type="file" name="bg_image" class="form-control-file" id="bg_file-image">
                        </div>
                        <small id="bg_image_error" class="form-text text-danger"></small>


                        <img id="bg_modal-preview" style="border-radius: 10px" src="https://via.placeholder.com/150"
                            alt="Preview" class="form-group" width="100" height="90">

                    </div>

                </form>

                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" id="CancelBtn" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" id="saveBtn" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    var oTable;
    $(function(){
    BindDataTable();
    });
        function BindDataTable() {
            oTable = $('#settings_datatable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                serverSide: true,
                "bDestroy": true,
                "bSort": true,
                 visible: true,
                 "iDisplayLength": 10,
                "sPaginationType": "full_numbers",
                "bAutoWidth":false,
                "bStateSave": true,
                columnDefs: [ {
                // targets: 0,
                visible: true
                } ],
                "language": {

                 emptyTable:"لا يوجد بيانات لعرضها",
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ ",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "بحث:",
                'selectedRow': 'مجمل المحدد',
                "sUrl": "",
                "oPaginate": {
                "sFirst": "الأول",
                "sPrevious": "السابق",
                "sNext": "التالي",
                "sLast": "الأخير",
                }},
                 "order": [[ 0, "asc" ]],
                    ajax: {
                    type: "GET",
                    contentType: "application/json",
                    url: '/dashboard/settings',
                    },
                    columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title'},
                    { data: 'contact_number', name: 'contact_number'},
                    { data: 'logo', name: 'logo' },
                    { data: 'Date', name: 'Date' },
                    {data: 'actions', name: 'actions',orderable:false,serachable:false,sClass:'text-center'},
                    ],
                    fnDrawCallback: function () {
                    }
           });
        }

</script>

<script>
    $(function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var SITEURL = '{{URL::to('')}}';
    $(document).on('click', '.editSetting', function (event) {
    var setting_id = $(this).data('id');
       $.ajax({
           url: SITEURL +'/dashboard/settings/edit/'+setting_id,
           method:'get',
           success:function(data) {
               $('#editmodelHeading').html("تعديل الإعدادات ");
                $('#EditsaveBtn').val("edit-setting");
                $('#editSettingModal').modal('show');
                $('#setting_id').val(data.result.id);
                $('#title').val(data.result.title);
                $('#sub_title').val(data.result.sub_title);
                $('#contact_number').val(data.result.contact_number);
                $('#emergency_contact_number').val(data.result.emergency_contact_number);
                $('#facebook_url').val(data.result.facebook_url);
                $('#twitter_url').val(data.result.twitter_url);
                $('#instagram_url').val(data.result.instagram_url);
                if(data.result.logo){
                $('#modal-preview').attr('src', SITEURL +'/images/logo/'+data.result.logo);
                $('#hidden_image').attr('src', SITEURL +'/images/logo/'+data.result.logo);
                }

                if(data.result.bg_image){
                $('#bg_modal-preview').attr('src', SITEURL +'/images/bg_image/'+data.result.bg_image);
                $('#bg_hidden_image').attr('src', SITEURL +'/images/bg_image/'+data.result.logo);
                }
           }
       })
        });
        $(document).on('click','#saveBtn',function() {
           let setting_form = document.getElementById('setting_form');
           let form_data = new FormData(setting_form);
           $.ajax({
            url:"/dashboard/settings/update",
            method:'post',
            data:form_data,
            dataType:'json',
            success:function (response){
            if (response.status == 504){
            Swal.fire({
            icon: 'error',
            title: 'خطأ',
            text: response.error,
            confirmButtonText:"حسناً"
            })
            }
            else if (response.status == 200) {
            Swal.fire({
            icon: 'success',
            title: 'تم',
            text: response.success,
            timer: 2000,

            showCancelButton: false,
            showConfirmButton: false
            })
            var oTable = $('#settings_datatable').dataTable();
            oTable.fnDraw(false);
            $('#thumb-output').html("");
            $("#bg_file-image").html("");
            $('#editSettingModal').modal('hide');
            }
            },
            contentType: false,
            cache: false,
            processData: false,
            })
          })
    });
</script>
@endpush
