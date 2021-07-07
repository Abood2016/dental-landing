<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request; use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class frontController extends Controller
{
    public function index()
    {
        $result = \Http::get("http://globaldentaldata.com/api/get_branches");
        $result= json_decode($result);

        return view('front.index',compact('result'));
    }
    public function setAppoinments(Request $request){

        $request->validate([
            'name'=>'required',
            'phone'=>'required|min:6',
            'branch_id'=>'required|numeric',
            'reserve_date'=>'required|date',
            'consultation'=>'required',
        ],[
            'name.required'=>'الاسم مطلوب',
            'phone.required'=>'رقم الهاتف مطلوب',
            'phone.min'=>'رقم الهاتف يجب ان الا يقل عن 6 ارقام',
            'branch_id.required'=>'الفرع مطلوب',
            'reserve_date.required'=>'تاريخ الحجز مطلوب',
            'consultation.required'=>' شرح الاستشارة مطلوب',
        ]);
        $appointments = new Appointment();
        $appointments->name = $request->input('name');
        $appointments->phone = $request->input('phone');
        $appointments->branch_id = $request->input('branch_id');
        if(is_null($appointments->service_id)){

        }else{
            $appointments->service_id = $request->input('service_id');
        }
        $appointments->date = $request->input('reserve_date');
        $appointments->note = $request->input('consultation');
        $appointments->save();
        return response()->json(['status'=>200]);
    }

    public function serviceShow($id)
    {

        $result = \Http::get("http://globaldentaldata.com/api/get_branches");
        $result = json_decode($result);
        $service = Service::findOrFail($id);
        return view('front.service_detail', compact('service', 'result'));
    }

    public function setAppoinmentsForService(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|min:6',
            'branch_id' => 'required|numeric',
            'reserve_date' => 'required|date',
        ], [
            'name.required' => 'الاسم مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.min' => 'رقم الهاتف يجب ان الا يقل عن 6 ارقام',
            'branch_id.required' => 'الفرع مطلوب',
            'reserve_date.required' => 'تاريخ الحجز مطلوب',
        ]);
        $appointments = new Appointment();
        $appointments->name = $request->input('name');
        $appointments->phone = $request->input('phone');
        $appointments->branch_id = $request->input('branch_id');
        $appointments->service_id = $request->input('service_id');
        $appointments->date = $request->input('reserve_date');
        $appointments->save();
        return response()->json(['status' => 200]);
    }
    
}
