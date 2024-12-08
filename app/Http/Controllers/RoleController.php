<?php

namespace App\Http\Controllers;

use App\Models\PermissionModal;
use App\Models\PermissionRoleModal;
use App\Models\RoleModel;
use Exception;
use Illuminate\Http\Request;
use Auth;
class RoleController extends Controller
{
    public function list()
    {
        $PermissionRole=PermissionRoleModal::getPermissionRole('Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        
        $data['PermissionRoleEdit'] =PermissionRoleModal::getPermissionRole('Edit Role',Auth::user()->role_id);
        $data['PermissionRoleAdd'] =PermissionRoleModal::getPermissionRole('Add Role',Auth::user()->role_id);
        $data['PermissionRoleDelete'] =PermissionRoleModal::getPermissionRole('Delete Role',Auth::user()->role_id);
        $data['getRecords'] = RoleModel::getRecord();
        $permissions = PermissionModal::getRecord(); // Ensure this returns the correct structure
        $data['permissions'] = $permissions;
        $data['rolePermissions'] = PermissionRoleModal::getRolePermission();


        
        // dd($permissions);
    
        return view('panel.role.list', $data);
    }
 
    public function insert(Request $request)
    {
        $PermissionRole=PermissionRoleModal::getPermissionRole('Add Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);
        }
        $saveRole=new RoleModel;    
   
        try
        {
            $saveRole->name=$request->name;
            $saveRole->save();
            PermissionRoleModal::InsertUpdateRecord($request->permission_id,$saveRole->id);
        }
        catch(Exception)
        {
         return redirect('panel/role')->with('error',"You Can't Save Role With Same Name");
        }

        return redirect('panel/role')->with('success',"Role successfully Created");
    }

    public function update($id, Request $request)
{
    $PermissionRole=PermissionRoleModal::getPermissionRole('Edit Role',Auth::user()->role_id);
    if(empty($PermissionRole))
    {
        abort(404);
    }
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255|unique:role,name,' . $id,
        'permission_id' => 'array',
        'permission_id.*' => 'integer|exists:permission,id',
    ]);

    try {
        // Find the role
        $role = RoleModel::findOrFail($id);

        // Update role name
        $role->name = $request->name;
        $role->save();

        // Get the current permissions for the role
        $currentPermissions = PermissionRoleModal::where('role_id', $id)
            ->pluck('permission_id')
            ->toArray();

        // Get the new permissions from the request
        $newPermissions = $request->input('permission_id', []);

        // Calculate permissions to add and remove
        $permissionsToAdd = array_diff($newPermissions, $currentPermissions);
        $permissionsToRemove = array_diff($currentPermissions, $newPermissions);

        // Add new permissions
        foreach ($permissionsToAdd as $permissionId) {
            PermissionRoleModal::create([
                'role_id' => $id,
                'permission_id' => $permissionId,
            ]);
        }

        // Remove unchecked permissions
        PermissionRoleModal::where('role_id', $id)
            ->whereIn('permission_id', $permissionsToRemove)
            ->delete();

        return redirect('panel/role')->with('success', "Role successfully updated.");
    } catch (Exception $e) {
        // \Log::error('Error updating role: ' . $e->getMessage());
        dd($e->getMessage());
        return redirect('panel/role')->with('error', "Failed to update the role.");
    }
}

    // public function update($id,Request $request)
    // {

    
    //     // Find the record by its ID
    //     $role = RoleModel::findOrFail($request->id);

    //     try
    //     {
    //         $role->name=$request->name;
    //         $role->save();
    //     }
    //     catch(Exception)
    //     {
    //      return redirect('panel/role')->with('error',"You Can't Save Role With Same Name");
    //     }

    //     return redirect('panel/role')->with('success',"Role successfully Created");
    // }
    public function delete($id)
    {
        $PermissionRole=PermissionRoleModal::getPermissionRole('Delete Role',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            abort(404);

            return;
        }
        $role = RoleModel::findOrFail($id);
        $role->delete();
        return redirect('panel/role')->with('success',"Role successfully deleted");
    }
}
