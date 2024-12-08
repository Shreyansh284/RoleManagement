<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class PermissionModal extends Model
// {
//     protected $table = 'permission';

//     // Function to retrieve grouped permissions
//     static public function getRecord()
//     {
//         // Retrieve distinct 'groupby' values
//         $groups = PermissionModal::select('groupby')
//             ->whereNotNull('groupby') // Ensure 'groupby' is not null
//             ->groupBy('groupby')
//             ->get();

//         $result = [];
//         foreach ($groups as $group) {
//             // Get all permissions under this 'groupby'
//             $permissions = PermissionModal::getPermissionGroup($group->groupby);

//             $result[] = [
//                 'groupby' => $group->groupby,
//                 'permissions' => $permissions->toArray(),
//             ];
//         }

//         return $result;
//     }

//     // Function to get permissions under a specific 'groupby'
//     static function getPermissionGroup($groupby)
//     {
//         return PermissionModal::where('groupby', '=', $groupby)->get(['id', 'name']);
//     }
// }


class PermissionModal extends Model
{
    protected $table = 'permission';

    static public function getRecord()  
    {
        // Get distinct groupby values without applying aggregation
        $getPermission = PermissionModal::groupBy('groupby')->get();

        $result = array();
        foreach ($getPermission as $value) {
            // Get the records that match the groupby for each permission
            $getPermissionGroup = PermissionModal::getPermissionGroup($value->groupby);
            $data = array();
            $data['id'] = $value->id; 
            $data['name'] = $value->name; 
            $group = array();

            // Process the groups within each permission
            foreach ($getPermissionGroup as $valueGroup){
                $dataGroup = array();
                $dataGroup['id'] = $valueGroup->id;
                $dataGroup['name'] = $valueGroup->name;
                $group[] = $dataGroup;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }

    // This function retrieves all permission groups for a specific 'groupby'
    static function getPermissionGroup($groupby)
    {
        return PermissionModal::where('groupby', '=', $groupby)->get();
    }
}
