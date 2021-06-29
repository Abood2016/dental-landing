@extends('layouts.app')

@section('content')
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
                                           id="appoinments_table">
                                        <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">الإسم</th>
                                            <th width="14%">الهاتف</th>
                                            <th width="13%">الفرع</th>
                                            <th width="13%">الحالة</th>
                                            <th width="10%">تاريخ الحجز</th>
                                            <th width="10%">التاريخ</th>
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
                    { data: 'status', name: 'status' },
                    { data: 'appoinments_Date', name: 'appoinments_Date' },
                    { data: 'Date', name: 'Date' },
                    // {data: 'actions', name: 'actions',orderable:false,serachable:false,sClass:'text-center'},
                ],

                fnDrawCallback: function () {
                }
            });
        }
    </script>
@endpush
