<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class SettingController extends Controller
{
    use ImageTrait;


    public function index(Request $request)
    {

        if (request()->ajax()) {
            $settings = DB::table('settings')->select([
                'id', 'title', 'logo', 'contact_number', 'sub_title',
                DB::raw("DATE_FORMAT(settings.created_at, '%Y-%m-%d') as Date"),
            ])->orderBy('id', 'DESC')->get();

            return DataTables::of($settings)
                ->addColumn('actions', function ($settings) {
                    if (auth()->user()->hasPermissionTo('setting_edit')){
                    return '<button type="button" class="btn btn-success btn-sm editSetting" data-toggle="modal" data-target="#editSettingModal" id="editSetting" data-id="' . $settings->id . '">تعديل</button>';
                    }
                })->addColumn('logo', function ($settings) {
                    $url = asset('images/logo/' . $settings->logo);
                    return '<img src="' . $url . '" border="0" style="border-radius: 10px;" width="80" class="img-rounded" align="center" />';
                })
                ->rawColumns(['logo', 'actions'])->make(true);
        }
        return view('admin.setting.index');
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $setting = Setting::where("id", "=", $id)->first();
            return response()->json(['result' => $setting]);
        }
    }

    public function update(Request $request)
    {
        $setting = Setting::findOrFail($request->setting_id);

        $array = [];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('/images/logo/') . $setting->logo)) {
                File::delete(public_path('/images/logo/') . $setting->logo);
            }
            $file->move(public_path('/images/logo/'), $fileName);
            $array = ['logo' => $fileName] + $array;
        }

        if ($request->hasFile('bg_image')) {
            $file = $request->file('bg_image');
            $fileName = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('/images/bg_image/') . $setting->bg_image)) {
                File::delete(public_path('/images/bg_image/') . $setting->bg_image);
            }
            $file->move(public_path('/images/bg_image/'), $fileName);
            $array = ['bg_image' => $fileName] + $array;
        }

        if ($request->title != $setting->title) {
            $array['title'] = $request->title;
        }

        if ($request->contact_number != $setting->contact_number) {
            $array['contact_number'] = $request->contact_number;
        }

        if ($request->emergency_contact_number != $setting->emergency_contact_number) {
            $array['emergency_contact_number'] = $request->emergency_contact_number;
        }

        if ($request->facebook_url != $setting->facebook_url) {
            $array['facebook_url'] = $request->facebook_url;
        }

        if ($request->sub_title != $setting->sub_title) {
            $array['sub_title'] = $request->sub_title;
        }

        if ($request->twitter_url != $setting->twitter_url) {
            $array['twitter_url'] = $request->twitter_url;
        }

        if ($request->instagram_url != $setting->instagram_url) {
            $array['instagram_url'] = $request->instagram_url;
        }

        if (!empty($array)) {
            $setting->update($array);
        }
        return response()->json(['status' => 200, 'success' => 'تم التحديث بنجاح']);
    }
}
