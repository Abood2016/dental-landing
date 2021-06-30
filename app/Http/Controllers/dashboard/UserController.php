<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    use ImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Draw = $request->input("Draw");

        if (request()->ajax()) {
            $users = DB::table('users')->select([
                'id', 'name', 'phone', 'email', 'image',
                DB::raw("DATE_FORMAT(users.created_at, '%Y-%m-%d') as Date"),
            ])->orderBy('id', 'DESC')->get();

            return DataTables::of($users)
                ->addColumn('actions', function ($users) {
                    return '<button type="button" class="btn btn-success btn-sm editUser" data-toggle="modal" data-target="#editUserModal" id="editUser" data-id="' . $users->id . '">تعديل</button>
                    <button type="button" data-id="' . $users->id . '" data-username="' . $users->name . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm " id="getDeleteId">حذف</button>';
                })->addColumn('image', function ($users) {
                    $url = asset('images/users/' . $users->image);
                    return '<img src="' . $url . '" border="0" style="border-radius: 10px;" width="80" class="img-rounded" align="center" />';
                })
                ->rawColumns(['image', 'actions'])->make(true);

            return response()->json(["data" => $users, 'draw' => $Draw]);
        }
        return view('admin.users.index');
    }


    public function store(UserRequest $request)
    {
        $file_name =  $this->saveImages($request->image, 'images/users');
        $user =   User::create([
            'image' => $file_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);
        return response()->json(['status' => 200, 'success' => 'تم الإضافة بنجاح']);
    }


    public function edit($id)
    {
        if (request()->ajax()) {
            $whereID = array('id' => $id);
            $data = User::where($whereID)->first();
            return response()->json(['result' => $data]);
        }
    }


    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->user_id);

        $array = [];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('/images/users/') . $user->image)) {
                File::delete(public_path('/images/users/') . $user->image);
            }
            $file->move(public_path('/images/users/'), $fileName);
            $array = ['image' => $fileName] + $array;
        }

        if ($request->name != $user->name) {
            $array['name'] = $request->name;
        }

        if ($request->email != $user->email) {
            $array['email'] = $request->email;
        }

        if ($request->phone != $user->phone) {
            $array['phone'] = $request->phone;
        }
        if ($request->password != '') {
            $array['password'] = Hash::make($request->password);
        }

        if (!empty($array)) {
            $user->update($array);
        }
        return response()->json(['status' => 200, 'success' => 'تم التحديث بنجاح']);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
       
        if (File::exists(public_path('images/users/') . $user->image)) {
            File::delete(public_path('images/users/') .  $user->image);
        }
       
        $result = $user->delete($id);
        if ($result) {
            return response()->json(['status' => 200, 'success' => 'تم الحذف بنجاح']);
        } else {
            return response()->json(['status' => 504, 'error' => 'حدث خطأ ما ']);
        }
    }

    public function profile($id)
    {
        $userProfile = User::findOrFail($id);
        return view('admin.users.show-profile', compact('userProfile'));
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $array = [];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('/images/users/') . $user->image)) {
                File::delete(public_path('/images/users/') . $user->image);
            }
            $file->move(public_path('/images/users/'), $fileName);
            $array = ['image' => $fileName] + $array;
        }

        if ($request->name != $user->name) {
            $array['name'] = $request->name;
        }

        if ($request->email != $user->email) {
            $array['email'] = $request->email;
        }

        if ($request->phone != $user->phone) {
            $array['phone'] = $request->phone;
        }
        if ($request->password != '') {
            $array['password'] = Hash::make($request->password);
        }

        if (!empty($array)) {
            $user->update($array);
        }
        return response()->json(['status' => 200, 'success' => 'تم التحديث بنجاح','data'=>$array]);
    }
}
