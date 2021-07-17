@extends('layouts.app')

@section('bar_title')
تعديل قائمة
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">القوائم
                        <span class="d-block text-muted pt-2 font-size-sm">تعديل القوائم &amp; القوائم</span>
                    </h3>
                </div>

            </div>
            <div class="modal-body pb-2">
                <form class="form" method="POST" action="{{ route('links_update') }}" id="Edit_links_form">

                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                    <div class="card-body">
                        <div class="form-group">
                            <label>عنوان القائمة :</label>
                            <div class="input-icon input-icon-right">
                                <input name="title" type="text" id="edit_title" class="form-control"
                                    value="{{ $data->title }}" placeholder="" />
                                <small id="title_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>رابط القائمة :</label>
                            <div class="input-icon input-icon-right">
                                <input name="url" type="text" id="edit_url" class="form-control"
                                    value="{{ $data->url }}" placeholder="" />
                                <small id="url_error" class="form-text text-danger"></small>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>icon :</label>
                            <div class="input-icon input-icon-right">
                                <input name="icon" type="text" id="edit_icon" value="{{ $data->icon }}"
                                    class="form-control" placeholder="" />
                                <small id="url_error" class="form-text text-danger"></small>
                            </div>
                            <input type="hidden" id="link_id" name="link_id" value="{{$data->id}}">
                        </div>
                        <div class="form-group">
                            <label for="">حالة القائمة</label>
                            <select class="form-control pb-2" name="link_type" id="editlink_type">
                                @if (is_null($data->parent_id))
                                <option value="" selected disabled>قائمة رئيسية</option>
                                @else
                                @foreach($links as $link)
                                <option value="{{$link->id}}" {{ ($data->parent_id == $link->id ? "selected":"") }}>
                                    {{$link->title}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>اظهار القائمة؟</label>
                            <input name="showinmenu" type="checkbox" {{($data->showinmenu == 1 ? 'checked' : '') }}
                                id="edit_showinmenu" class="checkbox" placeholder="" />
                        </div>

                        <div class="card-toolbar" style="text-align: left">
                            <a id="EditsaveBtn" class="btn btn-success mr-2">حفظ البيانات</a>
                            <button type="reset" class="btn btn-secondary">إلغاء</button>
                        </div>

                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')
<script>
    $(function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var SITEURL = '{{URL::to('')}}';
   
    $(document).on('click','#EditsaveBtn',function() {
    var link_id = $("#link_id").val();
    
    let links_form = document.getElementById('Edit_links_form');
    let form_data = new FormData(links_form);
    $.ajax({
    url:"/dashboard/links/update",
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