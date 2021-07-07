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
        <input type="checkbox" class="change-status"
            data-id="{{$appoinments->id}}" value="{{$appoinments->status}}">
    </div>

</body>

</html>
