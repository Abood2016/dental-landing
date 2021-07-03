<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultion;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class dashboardController extends Controller
{
    public function index()
    {

        $branches = \Http::get("http://globaldentaldata.com/api/get_branches");
        $branches = json_decode($branches);
        $appoinments = Appointment::latest()->limit(5)->where('status','=','0')->get();
        foreach ($appoinments as $item) {
            $item->branch_id = $branches[$item->branch_id - 1]->branchName;
        }
        return view('admin.dashboard',compact('appoinments'));
    }
}
