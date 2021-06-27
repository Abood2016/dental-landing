<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consultion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;



class consultionController extends Controller
{


    public function index(Request $request)
    {
        $Draw = $request->input("Draw");

        if (request()->ajax()) {
            $consultions = DB::table('consultions')
                ->select([
                    'consultions.id',
                    'consultions.email',
                    'consultions.phone',
                    'consultions.description',
                    DB::raw("DATE(consultions.created_at) as createdAt"),
                ])->get();


            return Datatables::of($consultions)
                ->addColumn('actions', function ($consultions) {
                    return '<button type="button" class="btn btn-success btn-sm editConsultion" data-toggle="modal" data-target="#consultionModal" id="editConsultion" data-id="' . $consultions->id . '">تعديل</button>
                    <button type="button" data-id="' . $consultions->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm " id="getDeleteId">حذف</button>';})
                    ->rawColumns(['actions'])->make(true);

                return response()
                    ->json([
                        'draw' => $Draw,
                        "data" => $consultions
                    ]);
        }
        return view('admin.consultion.index');
    }


    public function delete($id)
    {
       $consultion = Consultion::findOrFail($id);
       $result =  $consultion->delete();
       if ($result) {
           return response()->json(['status' => 200, 'success' => 'تم الحذف بنجاح']);
       }else{
            return response()->json(['status' => 504, 'error' => 'حدث خطأ ما']);

       }  
    }

    public function edit($id)
    {
            
        if (request()->ajax()) {
            $data = Consultion::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => 504, 'error' => 'حدث خطأ في ادخال البيانات']);
        }

        $cons = Consultion::find($request->consultion_id);
        $array = [];
    
        if ($request->email != $cons->email) {
            $array['email'] = $request->email;
        }

        if ($request->phone != $cons->phone) {
            $array['phone'] = $request->phone;
        }
        if ($request->description != $cons->description) {
            $array['description'] = $request->description;
        }

        if (!empty($array)) {
            $cons->update($array);
        }

        return response()->json(['status' => 200, 'success' => 'تمت العملية بنجاح']);



    }

    
}
