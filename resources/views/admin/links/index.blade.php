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
                        <h3 class="card-label">القوائم
<<<<<<< HEAD
                            <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; المستخدمين</span>

                            <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; القوائم</span>

=======
                            <span class="d-block text-muted pt-2 font-size-sm">عرض جميع &amp; القوائم</span>
>>>>>>> e6aa2396762533cf9185c83dfec9d14d344d71a9
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
                                           id="links_datatable">
                                        <thead>
                                        <tr>
                                            <th width="3%">#</th>
                                            <th width="13%">العنوان</th>
                                            <th width="13%">الرابط</th>
                                            <th width="13%">الإيقونة</th>
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
                                <label>حالة القائمة :</label>
                                <div class="input-icon input-icon-right">
                                    <input name="showinmenu" type="text" id="showinmenu" class="form-control" placeholder="" />
                                    <small id="showinmenu_error" class="form-text text-danger"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">إيقومة القائمة</label>
                                <div id="thumb-output"></div><br>
                                <input type="file" name="icon" class="form-control-file" id="file-image">
                                <small style="font-weight: bold">أبعاد الصور jpg | png | jpeg </small>
                            </div>
                            <small id="icon_error" class="form-text text-danger"></small>

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
    $(document).ready(function(e) {
    $('#btn_show_modal').on('click',function () {
        $('#linksModal').modal('show');
        $('#modelHeading').text('اضافة قائمة');
    })

    });
</script>
@endpush
