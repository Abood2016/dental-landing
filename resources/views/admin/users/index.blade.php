@extends('layouts.app')
@section('bar_title')
المستخدمين
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
        <span class="text-muted font-weight-bold mr-4">المتسخدمين</span>
        <!--end::Actions-->
    </div>
</div>

@endsection
@section('content')
<div class="container-box conatiner-fluid">
    <div class="row justify-content-center" style="margin-top: 20%">

        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">المستخدمين
                        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; المستخدمين</span>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="#" id="btn_show_modal" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <i class="ki ki-plus icon-sm"></i>
                        </span>تسجيل جديد </a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body table-responsive p-0">
                                <table class="table  table-condensed table-hover text-nowrap table-bordered"
                                    id="users_datatable">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">الإسم</th>
                                            <th width="13%">ألصورة</th>
                                            <th width="14%">الهاتف</th>
                                            <th width="13%">الإيميل</th>
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
<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form class="form" id="user_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label>الإسم :</label>
                            <div class="input-icon input-icon-right">
                                <input name="name" type="text" id="name" class="form-control" placeholder="" />
                                <small id="name_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>البريد :</label>
                            <div class="input-icon input-icon-right">
                                <input name="email" type="text" id="email" class="form-control" placeholder="" />
                                <small id="email_error" class="form-text text-danger"></small>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>الهاتف :</label>
                            <div class="input-icon input-icon-right">
                                <input name="phone" type="text" id="phone" class="form-control" placeholder="" />
                                <small id="phone_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>كلمة المرور :</label>
                            <div class="input-icon input-icon-right">
                                <input name="password" type="password" id="password" class="form-control"
                                    placeholder="" />
                                <small id="password_error" class="form-text text-danger"></small>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>تأكيد كلمة المرور :</label>
                            <div class="input-icon input-icon-right">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">أختيار</label>
                            <div id="thumb-output"></div><br>
                            <input type="file" name="image" class="form-control-file" id="file-image">
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
 <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form class="form" id="edit_user_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label>الإسم :</label>
                            <div class="input-icon input-icon-right">
                                <input name="name" type="text" id="edit_name" class="form-control" placeholder="" />
                                <small id="Ename_error" class="form-text text-danger"></small>
                            </div>
                            <input type="hidden"  name="user_id" id="user_id">

                        </div>
                        <div class="form-group">
                            <label>البريد :</label>
                            <div class="input-icon input-icon-right">
                                <input name="email" type="text" id="edit_email" class="form-control" placeholder="" />
                                <small id="email_error" class="form-text text-danger"></small>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>الهاتف :</label>
                            <div class="input-icon input-icon-right">
                                <input name="phone" type="text" id="edit_phone" class="form-control" placeholder="" />
                                <small id="phone_error" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>كلمة المرور :</label>
                            <div class="input-icon input-icon-right">
                                <input name="password" type="password" id="edit_password" class="form-control"
                                    placeholder="" />
                                <small id="password_error" class="form-text text-danger"></small>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>تأكيد كلمة المرور :</label>
                            <div class="input-icon input-icon-right">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control" placeholder="" />
                            </div>
                        </div>
                        <input type="hidden" name="hidden_image" id="hidden_image">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">أختيار</label>
                            <div id="thumb-output"></div><br>
                            <input type="file" name="image" class="form-control-file" id="file-image">
                        </div>
                     <small id="image_error" class="form-text text-danger"></small>

                    <img id="modal-preview" style="border-radius: 10px" src="https://via.placeholder.com/150" alt="Preview"
                            class="form-group" width="100" height="90">

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
            oTable = $('#users_datatable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                serverSide: true,
                select: true,
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
                    url: '/dashboard/users',

                    },
                    columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                   { data: 'image', name: 'image',class:'image_css' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'Date', name: 'Date' },
                    {data: 'actions', name: 'actions',orderable:false,serachable:false,sClass:'text-center'},
                    ],

                    fnDrawCallback: function () {
                    }
           });
        }

</script>


<script>
    $(document).ready(function() {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

   $("#btn_show_modal").click(function() {
    $("#modelHeading").html("أضافة مستخدم جديد");
    $("#modelHeading").html("أضافة خدمة جديد");
    $("#user_form").trigger('reset');//to clear the form
    $("#thumb-output").html('');
     $("#UserModal").modal('show');
   });
    $(document).on('click','#saveBtn',function() {

        $('#name_error').text('');
        $('#email_error').text('');
        $('#phone_error').text('');
        $('#password_error').text('');
        $('#image_error').text('');

        let formData = new FormData($('#user_form')[0]);
        $.ajax({
        type: 'POST',
        url: "{{route('user.store')}}",
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
        var oTable = $('#users_datatable').dataTable();
        oTable.fnDraw(false);
        $("#UserModal").modal('hide');
        $("#user_form").trigger('reset');//to clear the form
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
    $(document).on('click', '.editUser', function (event) {
    var user_id = $(this).data('id');
       $.ajax({
           url: SITEURL +'/dashboard/users/edit/'+user_id,
           method:'get',
           success:function(data) {
               $('#editmodelHeading').html("تعديل المستخدم ");
                $('#EditsaveBtn').val("edit-user");
                $('#editUserModal').modal('show');
                $('#user_id').val(data.result.id);
                $('#edit_name').val(data.result.name);
                $('#edit_email').val(data.result.email);
                $('#edit_phone').val(data.result.phone);
                if(data.result.image){
                $('#modal-preview').attr('src', SITEURL +'/images/users/'+data.result.image);
                $('#hidden_image').attr('src', SITEURL +'/images/users/'+data.result.image);
                }
           }
       })
        });
        $(document).on('click','#EditsaveBtn',function() {
           let user_form = document.getElementById('edit_user_form');
           let form_data = new FormData(user_form);
           $.ajax({
            url:"/dashboard/users/update",
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
            var oTable = $('#users_datatable').dataTable();
            oTable.fnDraw(false);
            $('#editUserModal').modal('hide');
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
    var deleteID;
    var SITEURL = '{{URL::to('')}}';
    $(document).on('click', '#getDeleteId', function(){
    deleteID = $(this).data('id');
    username = $(this).data('username');
    Swal.fire({
    title: 'هل أنت متأكد ؟',
    text: "هل أنت متأكد من حذف المستخدم " + username,
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
    url: SITEURL + "/dashboard/users/delete/" + deleteID,
    success: function (response) {
    if (response.status == 200) {
    Swal.fire(
    'تم',
    response.success,
    'success'
    )
    }
    var oTable = $('#users_datatable').dataTable();
    oTable.fnDraw(false);
    },
    error: function (response) {
    if (response.status == 504) {
    Swal.fire(
    'خطأ',
    response.error,
    'error'
    )}
    }});
    }})
    });
    setTimeout(function (){
    $('.container-box').fadeOut();
    },1000)
</script>
@endpush
