@extends('layouts.app')
@section('bar_title')
جميع الإستشارات
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
        <span class="text-muted font-weight-bold mr-4">الإستشارات</span>
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
                    <h3 class="card-label">الإستشارات
                        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; الإستشارات</span>
                    </h3>
                </div>
               
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap table-bordered" id="consultions_datatable">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">البريد</th>
                                            <th width="14%">الهاتف</th>
                                            <th width="13%">وصف الإستشارة</th>
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

<!-- Modal -->
<div class="modal fade" id="consultionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="consultaion_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label>البريد :</label>
                            <div class="input-icon input-icon-right">
                                <input name="email" type="text" id="email" class="form-control" placeholder="" />
                            </div>
                            <input type="hidden" name="consultion_id" id="consultion_id">
                        </div>

                        <div class="form-group">
                            <label>الهاتف :</label>
                            <div class="input-icon input-icon-right">
                                <input name="phone" type="text" id="phone" class="form-control" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>الإستشارة :</label>
                            <div class="input-icon input-icon-right">
                                <textarea id="description" name="description" rows="5" col="5" type="text"
                                    id="description" class="form-control" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>

                </form>
                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" id="saveBtn" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push("js")
<script>
    var oTable;
    $(function(){
    
    BindDataTable();
    });
        function BindDataTable() {
            oTable = $('#consultions_datatable').DataTable({
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
             dom: 'Bfrtip',
                buttons: [
                    {extend: 'copy',text: 'نسخ'},
                    
                   { extend: 'print',
                        text: 'طباعة الكل',
                        customize: function (win) {
                        $(win.document.body).css('direction', 'rtl');
                        },
                        exportOptions: {
                        columns: ':visible' }},

                    { extend: 'colvis',
                    text: ' تحديد الأعمدة'},
                    { extend: 'print',
                    text: 'طباعة التحديد',
                    exportOptions: {
                    
                    columns: ':visible',
                    modifier: {
                    selected: true}}},

                    {extend: 'excelHtml5',
                    text: 'طباعة أكسل',
                    exportOptions: {
                    columns: ':visible', } },
                    ],
                  
                
                    "order": [[ 0, "asc" ]],

                    ajax: {
                    type: "GET",
                    contentType: "application/json",
                    url: '/dashboard/consultions',
                    
                    },
                    columns: [
                    
                    { data: 'id', name: 'id' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'description', name: 'description' },
                    { data: 'createdAt', name: 'createdAt' },
                    {data: 'actions', name: 'actions',orderable:false,serachable:false,sClass:'text-center'},
                    ],
                  
                    fnDrawCallback: function () {
                    }
           });
        }

    var deleteID;
    var SITEURL = '{{URL::to('')}}';
    $('body').on('click', '#getDeleteId', function(){
     deleteID = $(this).data('id');
        Swal.fire({
        title: 'هل أنت متأكد ؟',
        text: "هل أنت متأكد من حذف الإستشارة ؟",
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
        url: SITEURL + "/dashboard/consultions/delete/" + deleteID,
        success: function (response) {
          if (response.status == 200) {
              Swal.fire(
            'تم',
            response.success,
            'success'
            )
          } 
            var oTable = $('#consultions_datatable').dataTable();
            oTable.fnDraw(false);
            },
            error: function (response) {
          if (response.status == 504) {
                Swal.fire(
                'خطأ',
                response.error,
                'error'
                )
            }
            }
            });
            }
   })
    });
        setTimeout(function (){
        $('.container-box').fadeOut();
        },1000)
        
</script>

<script>
    $(function () {

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).on('click', '.editConsultion', function (event) {
    var consultion_id = $(this).data('id');
       $.ajax({
           url:'/dashboard/consultions/edit/'+consultion_id,
           method:'get',
           success:function(data) {
               $('#modelHeading').html("تعديل الإستشارة");
                $('#saveBtn').val("edit-user");
                $('#consultionModal').modal('show');
                $('#consultion_id').val(data.result.id);
                $('#email').val(data.result.email);
                $('#phone').val(data.result.phone);
                $('#description').val(data.result.description);
           }
       })
        });
        $(document).on('click','#saveBtn',function() {
           let consultaion_form = document.getElementById('consultaion_form');
           let form_data = new FormData(consultaion_form);
           $.ajax({
            url:"/dashboard/consultions/update",
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
            else if (response.status ==200) {
            
            Swal.fire({
            icon: 'success',
            title: 'تم',
            text: response.success,
            timer: 2000,
       
            showCancelButton: false,
            showConfirmButton: false
            })
            var oTable = $('#consultions_datatable').dataTable();
                oTable.fnDraw(false);
                $('#consultionModal').modal('hide');

            } },
            contentType: false,
            cache: false,
            processData: false,
            })
          })
});
</script>

@endpush