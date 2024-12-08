<?php

namespace App\Http\Controllers;

use App\Models\PermissionRoleModal;
use App\Models\RoleModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Hash;
use Auth;
class UserController extends Controller
{
    public function userList()
    {
        $PermissionRole=PermissionRoleModal::getPermissionRole('User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
                
        $data['PermissionRoleEdit'] =PermissionRoleModal::getPermissionRole('Edit User',Auth::user()->role_id);
        $data['PermissionRoleAdd'] =PermissionRoleModal::getPermissionRole('Add User',Auth::user()->role_id);
        $data['PermissionRoleDelete'] =PermissionRoleModal::getPermissionRole('Delete User',Auth::user()->role_id);

        $data['getRoleRecords']=RoleModel::getRecord();
        $data['getUserRecords']=User::getRecord();
        return view('panel.user.userList',$data);
    }

    public function insertUser(Request $request)
    {
        $PermissionRole=PermissionRoleModal::getPermissionRole('Add User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        request()->validate
        ([
            'email'=>'required|email|unique:users',
        ]);
        $save=new User;

        try
        {

            $save->name=$request->name;
            $save->email=$request->email;
            $save->password=Hash::make($request->password);
            $save->role_id=$request->role_id;
            $save->save();
            return redirect('panel/user')->with('success',"Role successfully Created");
        }
        catch(Exception)
        {
         return redirect('panel/user')->with('error',"You Can't Save Role With Same Name");
        }

    }

    public function updateUser($id,Request $request)
    {
        $PermissionRole=PermissionRoleModal::getPermissionRole('Edit User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        request()->validate
        ([
            'email'=>'required|email',
        ]);
        try
        {
        $save=User::findOrFail($id);
        $save->name= $request->name;
        $save->email= $request->email;
        $save->role_id= $request->role_id;
        $save->save();
        // dd($save);

        return redirect('panel/user')->with('success',"Role Successfully Upadted");
        }
        catch(Exception $e)
        {
            dd( $e->getMessage());
        }


    }
    public function deleteUser($id)
    {
        $PermissionRole=PermissionRoleModal::getPermissionRole('Delete User',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('panel/user')->with('success',"Role successfully deleted");
    }
}
