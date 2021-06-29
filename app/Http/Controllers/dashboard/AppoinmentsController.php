<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
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

             return DataTables::of($appoinments)->make(true);

            return  response()->json(['data'=>$appoinments]);
        }
        return view('admin.appoinments.index');
    }
}
