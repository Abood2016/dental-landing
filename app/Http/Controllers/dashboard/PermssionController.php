<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\PermissionsName;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermssionController extends Controller
{
    public function index(){

        return view('admin.users.modal_permission',compact('users','permission'));
    }
    public function getPermission($id){
        $permission = PermissionsName::orderBy('id','asc')->first();
        $per_id= $permission->id;

        $permission_count = PermissionsName::count();
        $user =User::findOrFail($id);
        $user_id = $user->id;
        $user =$user->getAllPermissions()->toArray();
        return \response()->json(['data'=>$user,'user_id'=>$user_id,'permission_count'=>$permission_count,'per_id'=>$per_id]);
    }

    public function setPermission(Request $request){
        $user = User::findOrFail($request->input('id'));
        $user->syncPermissions();
        $permissions = $request->input('permisssions');
        if (is_null($permissions)){

        }else{
            foreach ($permissions as $permission ){
                $user->givePermissionTo($permission);
            }
        }

    }
}
