<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    use ImageTrait;

    public function index(Request $request)
    {
        $Draw = $request->input("Draw");
        
        if (request()->ajax()) {
            $services = DB::table('services')
                ->join("users", "users.id", "=", "services.user_id") 
            ->select([
                'services.id as service_id', 'services.title', 'users.name as username', 'services.description', 'services.user_id', 'services.image',
                DB::raw("DATE_FORMAT(services.created_at, '%Y-%m-%d') as Date"),
            ])->orderBy('service_id', 'DESC')->get();


            return DataTables::of($services)
                ->addColumn('actions', function ($services) {
                    return '<button type="button" class="btn btn-success btn-sm editservice" data-toggle="modal" data-target="#editServiceModal" id="editService" data-id="' . $services->service_id . '">تعديل</button>
                    <button type="button" data-id="' . $services->service_id . '" data-servicetitle="' . $services->title . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm " id="getDeleteId">حذف</button>';
                })
                ->addColumn('image', function ($services) {
                    $url = asset('images/service/' . $services->image);
                    return '<img src="' . $url . '" border="0" style="border-radius: 10px;" width="80" class="img-rounded" align="center" />';
            
                    })->editColumn('username', function ($services) {
                    return view('admin.service.user', compact('services'));
                
                })->rawColumns(['image', 'actions', 'username'])->make(true);
            return response()->json(["data" => $services , 'draw' => $Draw]);
        }
        return view('admin.service.index');
    }

    public function store(ServiceRequest $request)
    {
        $file_name =  $this->saveImages($request->image, 'images/service');
        $service =   Service::create([
            'image' => $file_name,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return response()->json(['status' => 200, 'success' => 'تم الإضافة بنجاح']);
    }


    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $result = $service->delete($id);
        if ($result) {
            return response()->json(['status' => 200, 'success' => 'تم الحذف بنجاح']);
        } else {
            return response()->json(['status' => 504, 'error' => 'حدث خطأ ما ']);
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $whereID = array('id' => $id);
            $data = Service::where($whereID)->first();
            return response()->json(['result' => $data]);
        }
    }

    public function update(UpdateServiceRequest $request)
    {
        $service = Service::findOrFail($request->service_id);
        $array = [];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('/images/service/') . $service->image)) {
                File::delete(public_path('/images/service/') . $service->image);
            }
            $file->move(public_path('/images/service/'), $fileName);
            $array = ['image' => $fileName] + $array;
        }

        if ($request->title != $service->title) {
            $array['title'] = $request->title;
        }

        if ($request->description != $service->description) {
            $array['description'] = $request->description;
        }


        if (!empty($array)) {
            $service->update($array);
        }
        return response()->json(['status' => 200, 'success' => 'تم التحديث بنجاح']);
    }
}
