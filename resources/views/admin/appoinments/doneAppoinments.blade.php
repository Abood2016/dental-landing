@extends('layouts.app')

@section('bar_title')
الحجوزات التي تمت مراجعتها
@endsection

@push('css')
<style>
    .center-check {

        text-align: center !important;
    }
</style>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
@endpush
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">مواعيد تمت مراجعتها
                        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع المواعيد</span>
                    </h3>
                </div>
            </div>

            <div class="container mt-4">
                <div class="form-group col-sm-12 row ">
                    <div class="col-sm-12 row" style="margin-right: 0.01em">
                        <span class="mr-1" style="font-size: 1.2em;font-weight: 600">
                             فلترة المواعيد
                        </span>
                        <form class="col-sm-12 row mt-2 DTForm" id="search_form" method="GET">
                            @csrf
                            <p class="col-sm-6 d-flex flex-row"> <span class="ml-3 mt-1"> من</span>
                                <input name="start_date" type="text" id="start-date" autocomplete="off"
                                    class="datepicker form-control start-date">
                                <span class="ml-3 mr-3 mt-1"> الى</span>
                                <input name="end_date" type="text" id="end-date" autocomplete="off"
                                    class="datepicker form-control">

                                <button type="button" id="filter"
                                    class="btn btn-sm btn-success btn-submit mr-3">بحث</button>
                            </p>
                        </form>
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
                                                <th width="10%">تاريخ الحجز</th>
                                                <th width="13%">الحالة</th>
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

        function BindDataTable(start_date = '', end_date = '') {

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
                    url: '/dashboard/appoinments/done-appoinments',
                    data: {start_date:start_date,end_date:end_date}
                },

                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'phone', name: 'phone',class:'image_css' },
                    { data: 'branch_id', name: 'branch_id' },
                    { data: 'appoinments_Date', name: 'appoinments_Date' },
                    { data: 'status', name: 'status',class: 'center-check' },
                ],

                fnDrawCallback: function () {
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        $(function() {
                $("#start-date").datepicker({
                    dateFormat: "yy-mm-dd",
                    maxDate: 0,
                    onSelect: function (date) {
                        var dt2 = $('#end-date');
                        var startDate = $(this).datepicker('getDate');
                        var minDate = $(this).datepicker('getDate');
                        if (dt2.datepicker('getDate') == null){
                            dt2.datepicker('setDate', minDate);
                        }
                        //dt2.datepicker('option', 'maxDate', '0');
                        dt2.datepicker('option', 'minDate', minDate);
                    }
                });
                $('#end-date').datepicker({
                    dateFormat: "yy-mm-dd",
                    maxDate: 0
                });
            });
    </script>
    <script>
        $(document).ready(function (){
            $('#filter').click(function(){
            var start_date = $('#start-date').val();
            var end_date =   $('#end-date').val();
            if(start_date != '' && end_date != '')
            {
            $('#appoinments_table').DataTable().destroy();
            BindDataTable(start_date, end_date);
            }
            else
            {
            alert('يرجى إختيار تاريخ');
            }o
            });
         });

    </script>
@endpush
