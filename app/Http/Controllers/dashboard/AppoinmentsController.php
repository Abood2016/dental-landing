<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class AppoinmentsController extends Controller
{
    public function index(Request $request)
    {
        $branches = \Http::get("http://globaldentaldata.com/api/get_branches");
        $branches = json_decode($branches);

        if (request()->ajax()) {
            $appoinments = DB::table('appointments')
                ->where('status', '=', '0')
                ->select([
                    'id', 'name', 'phone', 'branch_id', 'status',
                    DB::raw("DATE_FORMAT(appointments.date, '%Y-%m-%d') as appoinments_Date"),
                    DB::raw("DATE_FORMAT(appointments.created_at, '%Y-%m-%d') as Date"),
                ])->orderBy('id', 'DESC')->get();
            foreach ($appoinments as $item) {
                $item->branch_id = $branches[$item->branch_id - 1]->branchName;
            }
            return  DataTables::of($appoinments)
                ->addColumn('actions', function ($appoinments) {
                    return '<button type="button" data-id="' . $appoinments->id . '"  data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-delete btn-sm " id="getDeleteId">حذف</button>';
                })->editColumn('status', function ($appoinments) {
                    return view('admin.appoinments.status', compact('appoinments'));
                })->rawColumns(['actions', 'status'])
                ->make(true);
        }
        return view('admin.appoinments.index');
    }
    public function delete($id)
    {

        $user = Appointment::findOrFail($id);
        $result = $user->delete($id);
        if ($result) {
            return response()->json(['status' => 200, 'success' => 'تم الحذف بنجاح']);
        } else {
            return response()->json(['status' => 504, 'error' => 'حدث خطأ ما ']);
        }
    }

    public function doneAppoinment()
    {
        $branches = \Http::get("http://globaldentaldata.com/api/get_branches");
        $branches = json_decode($branches);

        if (request()->ajax()) {
            $appoinments = DB::table('appointments')
                ->where('status', '=', '1')
                ->select([
                    'id', 'name', 'phone', 'branch_id', 'status',
                    DB::raw("DATE_FORMAT(appointments.date, '%Y-%m-%d') as appoinments_Date"),
                ])->orderBy('id', 'DESC')->get();
            foreach ($appoinments as $item) {
                $item->branch_id = $branches[$item->branch_id - 1]->branchName;
            }
            return  DataTables::of($appoinments)
                ->editColumn('status', function ($appoinments) {
                    return view('admin.appoinments.done_status', compact('appoinments'));
                })->rawColumns(['actions', 'status'])
                ->make(true);
        }
        return view('admin.appoinments.doneAppoinments');
    }


    public function changeStatus(Request $request)
    {
        try {
            $app = Appointment::findOrFail($request->input('id'));
            $app->status = '1';
            if ($app->update()) {
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 500]);
            }
        } catch (ModelNotFoundException $exception) {
            return response()->json(['status' => 404]);
        }
    }
}
