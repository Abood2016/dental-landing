<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SettingController extends Controller
{
    public function index(Request $request)
    {

        if (request()->ajax()) {
            $settings = DB::table('settings')->select([
                'id','title','logo','contact_number',
            ])->orderBy('id','DESC')->get();

            return DataTables::of($settings)
             ->addColumn('actions', function ($settings) {
                return '<button type="button" class="btn btn-success btn-sm editSetting" data-toggle="modal" data-target="#editSettingModal" id="editSetting" data-id="' . $settings->id . '">تعديل</button>';
            })->addColumn('logo', function ($settings) {
                    $url = asset('images/settings/' . $settings->logo);
                    return '<img src="' . $url . '" border="0" style="border-radius: 10px;" width="80" class="img-rounded" align="center" />';
                })
            ->rawColumns(['logo', 'actions'])->make(true);
        }

        return view('admin.setting.index');
    }
}
