@extends('layouts.app')

@section('bar_title')
الحجوزات
@endsection


@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">مواعيد قيد المراجعة
                        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع المواعيد</span>
                    </h3>
                </div>
                <a href="" title="أنقر لتحديث الجدول" id="refresh_table"
                    class="btn btn-primary-light font-weight-bolder mr-2">
                    <span class="svg-icon svg-icon-md">
                        <i class="ki ki-refresh icon-sm"></i>
                    </span>تحديث الجدول </a>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body table-responsive p-0">
                                <table class="table  table-condensed table-hover text-nowrap table-bordered"
                                    id="appoinments_table">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">الإسم</th>
                                            <th width="14%">الهاتف</th>
                                            <th width="13%">الفرع</th>
                                            <th width="10%">تاريخ الحجز</th>
                                            <th width="10%">تاريخ الطلب</th>
                                            <th width="10%">الحالة</th>
                                            <th width="10%">الاجراء</th>
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
@endsection
@push('js')
<script>
    var oTable;
        $(function(){
            BindDataTable();
        });

        function BindDataTable() {
            oTable = $('#appoinments_table').DataTable({
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
                    url: '/dashboard/appoinments',

                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'phone', name: 'phone',class:'image_css' },
                    { data: 'branch_id', name: 'branch_id' },
                    { data: 'appoinments_Date', name: 'appoinments_Date' },
                    { data: 'Date', name: 'Date' },
                    { data: 'status', name: 'status',orderable:false,serachable:false,class: 'checkbook' },
                    {data: 'actions', name: 'actions',orderable:false,serachable:false,sClass:'text-center'},
                ],
                fnDrawCallback: function () {
                }
            });
        }
</script>
<script>
    var SITEURL = '{{URL::to('')}}';
        $(document).on('click', '.btn-delete', function(){
         var   deleteID = $(this).data('id');
            Swal.fire({
                title: 'هل أنت متأكد ؟',
                text: "هل أنت متأكد من الحذف",
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
                        url: SITEURL + "/dashboard/appoinments/delete/" + deleteID,
                        success: function (response) {
                            if (response.status == 200) {
                                Swal.fire(
                                    'تم',
                                    response.success,
                                    'success'
                                )
                            }
                            var oTable = $('#appoinments_table').dataTable();
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
<script>
    $(document).on('click','.change-status',function (){
            let id = $(this).attr('data-id')
            $.ajax({
                url:'appoinments/change_status',
                method:'get',
                data:{
                    'id':id
                },
                success:function (res){
                    if (res.status == 200){
                        Swal.fire({

                            icon: 'success',
                            title: 'تم',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        var oTable = $('#appoinments_table').dataTable();
                        oTable.fnDraw(false);
                    }
                    else {
                        swal.fire(
                            "حدث خطأ ما","",'error'
                        )
                    }

                }
            })
        })
</script>

<script>
$(document).on('click','#refresh_table',function (event) {
    event.preventDefault();
   var oTable = $('#appoinments_table').dataTable();
        oTable.fnDraw(false);
});
$( document ).ajaxStart(function() {
    $('.container-box').fadeIn();
});
$( document ).ajaxComplete(function() {
    $('.container-box').fadeOut();
});
</script>
@endpush
