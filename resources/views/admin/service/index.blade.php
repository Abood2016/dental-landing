@extends('layouts.app')
@section('bar_title')
الخدمات
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
        <span class="text-muted font-weight-bold mr-4">الخدمات</span>
        <!--end::Actions-->
    </div>
</div>
@endsection

@push('css')
<style>
    #refresh_table:hover {
        color: darksalmon
    }

    /* td{
            text-align: center !important;
        } */
</style>
@endpush
@section('content')


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">الخدمات
                        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; الخدمات</span>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="" title="أنقر لتحديث الجدول" id="refresh_table"
                        class="btn btn-primary-light font-weight-bolder mr-2">
                        <span class="svg-icon svg-icon-md">
                            <i class="ki ki-refresh icon-sm"></i>
                        </span>تحديث الجدول </a>
                    <!--end::Button-->

                    <!--begin::Button-->
                    <a href="" id="btn_show_modal" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <i class="ki ki-plus icon-sm"></i>
                        </span>خدمة جديد </a>
                    <!--end::Button-->

                    <!--begin::Button-->

                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body table-responsive p-0">
                                <table class="table  table-condensed table-hover text-nowrap table-bordered"
                                    id="service_datatable">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">العنوان</th>
                                            <th width="13%">الصورة</th>
                                            <th width="13%">نبذة عن الخدمة</th>
                                            <th width="13%">تمت الإضافة بواسطة</th>
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

<!-- Add Modal -->
<div class="modal fade" id="ServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-2">
                <form class="form" id="service_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label>الإسم :</label>
                            <div class="input-icon input-icon-right">
                                <input name="title" type="text" id="title" class="form-control" placeholder="" />
                                <small id="title_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>الوصف :</label>
                            <div class="input-icon input-icon-right">
                                <textarea name="description" type="text" rows="5" cols="5" id="description"
                                    class="form-control" placeholder=""></textarea>
                                <small id="description_error" class="form-text text-danger"></small>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">أختيار</label>
                            <div id="thumb-output"></div><br>
                            <input type="file" name="image" class="form-control-file" id="file-image">
                            <small style="font-weight: bold">أبعاد الصور jpg | png | jpeg </small>
                        </div>
                        <small id="image_error" class="form-text text-danger"></small>

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

<!-- Edit Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form class="form" id="edit_service_form">
                    <input type="hidden" id="service_id" name="service_id">
                    <div class="card-body">
                        <div class="form-group">
                            <label>الإسم :</label>
                            <div class="input-icon input-icon-right">
                                <input name="title" type="text" id="edit_title" class="form-control" placeholder="" />
                                <small id="title_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>الوصف :</label>
                            <div class="input-icon input-icon-right">
                                <textarea name="description" type="text" rows="5" cols="5" id="edit_description"
                                    class="form-control" placeholder=""></textarea>
                                <small id="description_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <input type="hidden" name="hidden_image" id="hidden_image">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">أختيار</label>
                            <div id="thumb-output"></div><br>
                            <input type="file" name="image" class="form-control-file" id="file-image">
                            <small style="font-weight: bold">أبعاد الصور jpg | png | jpeg </small>
                        </div>
                        <small id="image_error" class="form-text text-danger"></small>
                        <img id="modal-preview" style="border-radius: 10px" src="https://via.placeholder.com/150"
                            alt="Preview" class="form-group" width="100" height="90">
                    </div>

                </form>

                <!--end::Form-->

            </div>
            <div class="modal-footer">
                <button type="button" id="CancelBtn" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" id="EditsaveBtn" class="btn btn-primary">حفظ</button>
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
            oTable = $('#service_datatable').DataTable({
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
                }
                },
                 "order": [[ 0, "asc" ]],
                    ajax: {
                    type: "GET",
                    contentType: "application/json",
                    url: '/dashboard/services',

                    },
                    columns: [
                    { data: 'service_id', name: 'service_id' },
                    { data: 'title', name: 'title' },
                    { data: 'image', name: 'image' },
                    { data: 'description', name: 'description' },
                    { data: 'username', name: 'username' ,class:'user_item' },
                    { data: 'Date', name: 'Date' },
                    {data: 'actions', name: 'actions',orderable:false,serachable:false,sClass:'text-center'},
                    ],
                    fnDrawCallback: function () {
                    }
           });
        }
</script>

<script>
    var deleteID;
    var SITEURL = '{{URL::to('')}}';
    $(document).on('click', '#getDeleteId', function(){
    deleteID = $(this).data('id');
    titleService = $(this).data('servicetitle');
    Swal.fire({
    title: 'هل أنت متأكد ؟',
    text: "هل أنت متأكد من حذف الخدمة " + titleService,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonText: 'إلغاء',
    cancelButtonColor: '#d33',
    confirmButtonText: 'نعم , إحذف'
    }).then((result) => {
    if (result.isConfirmed) {
    $.ajax({
    type: "get",
    url: SITEURL + "/dashboard/services/delete/" + deleteID,
    success: function (response) {
    if (response.status == 200) {
    Swal.fire(
    'تم',
    response.success,
    'success'
    )
    }
    var oTable = $('#service_datatable').dataTable();
    oTable.fnDraw(false);
    },
    error: function (response) {
    if (response.status == 504) {
    Swal.fire('خطأ', response.error,'error'
    )}
    }});
    }})
    });

</script>

<script>
    $(document).ready(function() {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

   $("#btn_show_modal").click(function(event) {
       event.preventDefault();
    $("#modelHeading").html("أضافة خدمة جديد");
    $("#service_form").trigger('reset');//to clear the form
    $("#thumb-output").html('');
     $("#ServiceModal").modal('show');
   });
    $(document).on('click','#saveBtn',function() {

        $('#title_error').text('');
        $('#description_error').text('');
        $('#image_error').text('');

        let formData = new FormData($('#service_form')[0]);
        $.ajax({
        type: 'POST',
        url: "{{route('service.store')}}",
        enctype: 'multipart/form-data',
        data:formData,
        processData: false,
        contentType: false,
        cache: false,

        success: function (response) {
            if (response.status == 200) {
                Swal.fire(
                'تم',
                response.success,
                'success'
                )
            }
        var oTable = $('#service_datatable').dataTable();
        oTable.fnDraw(false);
        $("#ServiceModal").modal('hide');
        $("#service_form").trigger('reset');//to clear the form
        $("#thumb-output").html('');
        },
        error: function (reject){
        var response = $.parseJSON(reject.responseText);
        $.each(response.errors, function (key, val) {
        $("#" + key + "_error").text(val[0]); //# معناها اختار لي اسم الايررور
        });
        },
        });
    });
});
</script>

<script>
    $(function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var SITEURL = '{{URL::to('')}}';
    $(document).on('click', '.editservice', function (event) {
    var service_id = $(this).data('id');
       $.ajax({
           url: SITEURL +'/dashboard/services/edit/'+service_id,
           method:'get',
           success:function(data) {
               $('#editmodelHeading').html("تعديل الخدمة ");
                $('#EditsaveBtn').val("edit-service");
                $('#editServiceModal').modal('show');
                $('#service_id').val(data.result.id);
                $('#edit_title').val(data.result.title);
                $('#edit_description').val(data.result.description);
                if(data.result.image){
                $('#modal-preview').attr('src', SITEURL +'/images/service/'+data.result.image);
                $('#hidden_image').attr('src', SITEURL +'/images/service/'+data.result.image);
                }
           }
       })
        });
        $(document).on('click','#EditsaveBtn',function() {
           let user_form = document.getElementById('edit_service_form');
           let form_data = new FormData(user_form);
           $.ajax({
            url:"/dashboard/services/update",
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
            var oTable = $('#service_datatable').dataTable();
            oTable.fnDraw(false);
            $('#editServiceModal').modal('hide');
            }
             },
            contentType: false,
            cache: false,
            processData: false,
            })
          })
});
</script>

<script>
    $(document).on('click','#refresh_table',function(event) {
    event.preventDefault();
        var oTable = $('#service_datatable').dataTable();
        oTable.fnDraw(false);
    })

</script>
@endpush