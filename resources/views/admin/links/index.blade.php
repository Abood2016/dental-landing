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
                                            <th width="13%">الإيميل</th>
                                            <th width="14%">الهاتف</th>
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

@endsection

@push('js')

@endpush
