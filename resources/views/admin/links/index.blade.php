@extends('layouts.app')
@section('bar_title')
القوائم
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
        <span class="text-muted font-weight-bold mr-4">القوائم</span>

    </div>
</div>
@endsection
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">القوائم
                        <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; المستخدمين</span>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="#" id="reset" style="display: none;" class="btn btn-info font-weight-bolder mr-2">
                        <span class="svg-icon svg-icon-md">
                            {{-- <i class="ki ki-plus icon-sm"></i> --}}
                        </span>تحديث الجدول</a>

                    <a href="#" id="btn_show_modal" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <i class="ki ki-plus icon-sm"></i>
                        </span>تسجيل جديد </a>
                    <!--end::Button-->
                </div>
            </div>

            <div class="col-sm-12 row ">
                <div class="col-sm-12 row" style="margin-right: 0.01em">
                    <span class="mr-1" style="font-size: 1.2em;font-weight: 600;margin-top: 10px;margin-right: 33px;">
                        فلترة الروابط
                    </span>
                    <form class="col-sm-12 row mt-2 DTForm" id="search_form" method="GET">
                        @csrf
                        <p class="col-sm-6 d-flex flex-row">
                            <span class="ml-3 mr-3 mt-1"></span>
                            <select name="showinmenu" id="showinmenu" class="form-control">
                                <option selected disabled id="disable-option">إختار حسب الحالة</option>
                                <option value="1">مفعلة</option>
                                <option value="0">غير مفعلة</option>
                            </select>
                            <button type="button" id="filter" class="btn btn-sm btn-success btn-submi"
                                style="margin-right: 10px">بحث</button>
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
                                    id="links_datatable">
                                    <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">العنوان</th>
                                            <th width="13%">الرابط</th>
                                            <th width="13%">الإيقونة</th>
                                            <th width="14%">نوع القائمة</th>
                                            <th width="14%">حالة القائمة</th>
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

<div class="modal fade" id="linksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form class="form" id="links_form">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                    <div class="card-body">
                        <div class="form-group">
                            <label>عنوان القائمة :</label>
                            <div class="input-icon input-icon-right">
                                <input name="title" type="text" id="title" class="form-control" placeholder="" />
                                <small id="title_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>رابط القائمة :</label>
                            <div class="input-icon input-icon-right">
                                <input name="url" type="text" id="url" class="form-control" placeholder="" />
                                <small id="url_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>icon :</label>
                            <div class="input-icon input-icon-right">
                                <input name="icon" type="text" id="icon" class="form-control" placeholder="" />
                                <small id="url_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">حالة القائمة</label>
                            <select class="form-control pb-2" name="link_type" id="main_links">


                            </select>
                        </div>
                        <div class="form-group">
                            <label>اظهار القائمة؟</label>
                            <input name="showinmenu" type="checkbox" value="1" id="showinmenu" class="checkbox"
                                placeholder="" />
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <div class="modal-footer">
                <button type="button" id="CancelBtn" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" id="saveBtn" class="btn btn-primary save-link">حفظ</button>
            </div>
        </div>
    </div>
</div>
<!--Edit Modal-->

@endsection

@push('js')
<script>
    var oTable;
        $(function(){
        BindDataTable();
        });
            function BindDataTable(show_menu = '') {
                oTable = $('#links_datatable').DataTable({
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
                        url: '/dashboard/links',
                        data: {show_menu:show_menu
                        }
                        },
                        columns: [
                        { data: 'id', name: 'id' },
                        { data: 'title', name: 'title' },
                        { data: 'url', name: 'url' },
                        { data: 'icon', name: 'icon' },
                        { data: 'menu-type', name: 'menu-type' },
                        { data: 'show-menu', name: 'show-menu' },
                        {data: 'actions', name: 'actions',orderable:false,serachable:false,sClass:'text-center'},
                        ],
                        fnDrawCallback: function () {
                        }
               });
            }
</script>
<script>
    $(document).ready(function(e) {
    $('#btn_show_modal').on('click',function () {
        $('#links_form').trigger('reset')
        $('#linksModal').modal('show');
        $('#modelHeading').text('اضافة قائمة');
        $.ajax({
            url:'/dashboard/links/get_main',
            method:'get',
            data:{},
            success:function (response){

                $("#main_links").html("");
                $('#main_links').append("<option value='0' selected>قائمة رئيسية</option>")
                for (const [key, value] of Object.entries(response.data)) {
                    $('#main_links').append("<option value="+"'"+`${value.id}`+"'"+">"+`${value.title}`+"</option>")
                }
            }
        })
    })
    });
</script>
<script>
    $(document).on('click','.save-link',function (){
        let links_form = document.getElementById('links_form');
        let form_data = new FormData(links_form);
        $.ajax({
            url:'/dashboard/links/set_links',
            method:'post',
            data:form_data,
            success:function (){
                $("#linksModal").modal('hide');
                var oTable = $('#links_datatable').dataTable();
                oTable.fnDraw(false);
            },
            processData:false,
            cache:false,
            contentType:false
        })
    })

</script>
<script>
    $(document).ready(function(e) {
        $('#filter').click(function(){
         var show_menu = $('#showinmenu').val();
            if(show_menu != null)
            {
                $('#links_datatable').DataTable().destroy();
                BindDataTable(show_menu);
                $('#reset').css({"display": "block",});
            }else
            {
                alert('حالة القائمة مطلوبة');
            }
    });
    });
</script>
<script>
    $(document).ready(function(e) {
        $('#reset').click(function(){
        $('#search_form').trigger('reset');
        $('#reset').css({"display": "none",});
         $(function(){
            BindDataTable();
            });
    });
    });
</script>
@endpush