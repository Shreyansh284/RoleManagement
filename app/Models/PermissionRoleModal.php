<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRoleModal extends Model
{
    protected $table = 'permission_role';
    protected $fillable = [
        'role_id',
        'permission_id',
        ];

    // Returns a mapping of role IDs to their associated permission IDs
    static public function getRolePermission()
    {
        $records = self::all();
        $result = [];

        foreach ($records as $record) {
            $result[$record->role_id][] = $record->permission_id;
        }

        return $result;
    }
    static public function getPermissionRole($slug,$role_id)
    {
        return PermissionRoleModal::select('permission_role.id')
        ->join('permission','permission.id','=','permission_role.permission_id')
        ->where('role_id','=',$role_id)
        ->where('permission.slug','=',$slug)
        ->count();
    }


}
