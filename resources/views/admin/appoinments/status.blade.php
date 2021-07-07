<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <style>
        .checkbook {
            text-align: center !important;
        }
    </style> --}}

</head>

<body>
    <div class="checkbook">
        <button type="checkbox" class="btn btn-primary btn-sm  change-status" data-id="{{$appoinments->id}}" value="{{$appoinments->status}}">تأكيد </button>
    </div>

</body>

</html>
