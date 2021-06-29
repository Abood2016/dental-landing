<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AppoinmentsController extends Controller
{
    public function index(Request $request){
        if (request()->ajax()){
            $appoinments = DB::table('appointments')->select([
                'id', 'name', 'phone', 'branch_id','status',
                DB::raw("DATE_FORMAT(appointments.date, '%Y-%m-%d') as appoinments_Date"),
                DB::raw("DATE_FORMAT(appointments.created_at, '%Y-%m-%d') as Date"),
            ])->orderBy('id', 'DESC')->get();

              return  DataTables::of($appoinments)
                 ->addColumn('actions', function ($appoinments) {
                     return '<button type="button" data-id="' . $appoinments->id . '"  data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-delete btn-sm " id="getDeleteId">حذف</button>';
                 })->rawColumns(['actions'])
                 ->make(true);

            return  response()->json(['data'=>$appoinments]);
        }
        return view('admin.appoinments.index');
    }
    public function delete($id){

        $user = Appointment::findOrFail($id);
        $result = $user->delete($id);
        if ($result) {
            return response()->json(['status' => 200, 'success' => 'تم الحذف بنجاح']);
        } else {
            return response()->json(['status' => 504, 'error' => 'حدث خطأ ما ']);
        }
    }
}
