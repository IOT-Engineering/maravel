<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Role;
use App\RolePermission;
use App\Maravel\Traits\Routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Module;

class RolesController extends Controller
{
    use Routes;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 11;

        if (!empty($keyword))
        {
            $roles = Role::where('name', 'ILIKE', "%$keyword%")->paginate($perPage);
        }
        else
        {
            $roles = Role::paginate($perPage);
        }

        return view('dashboard.roles.index', compact('roles'));
    }

    public function searchRolePermissions(Request $request, $view)
    {
        $keyword = $request->get('search');
        $rolId = $request->get('rolId');
    
        $perPage = 11;

        if (!empty($keyword))
        {
            $role = Role::find($rolId);
            $permissions = $role->permissions()
                            ->where('module','ILIKE',"%$keyword%")
                            ->orWhere('uri','ILIKE',"%$keyword%")
                            ->orWhere('method','ILIKE',"%$keyword%")
                            ->paginate($perPage);

        }
        else
        {
            $role = Role::find($rolId);
            $permissions = $role->permissions()->paginate($perPage);
        }


        if($view == 'edit')
        {
            return view('dashboard.roles.edit', compact('role','permissions'));
        }
        elseif ($view == 'show')
        {
            return view('dashboard.roles.show', compact('role','permissions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        
        $requestData = $request->all();

        $role = Role::create($requestData);

        $permissionList = $this->getPermissionsListWithRole($role->id);
    
        $role->permissions()->createMany($permissionList);
        
        return redirect('admin/roles')->with('flash_message', 'Rol added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        //Role Admin Cannot be modify
        if($this->isAdmin($role))
        {
            return redirect('admin/roles')->with('flash_message_error', 'Rol admin cannot be modified!');
        }

        $permissions = $role->permissions;

        return view('dashboard.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $perPage = 11;

        //Role Admin Cannot be modify
        if($this->isAdmin($role))
        {
            return redirect('admin/roles')->with('flash_message_error', 'Rol admin cannot be modified!');
        }

        $modules = Module::all();
        
        foreach ($modules As $module)
        {
            Log::info($module);
    
        }
        
        $permissions = $role->permissions()->paginate($perPage);

        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required'
        ]);

        $requestData = $request->all();
        
        $role = Role::findOrFail($id);
        
        //Role Admin Cannot be modify
        if($this->isAdmin($role))
        {
            return redirect('admin/roles')->with('flash_message_error', 'Rol admin cannot be modified!');
        }

        // Update Rol
        $role->update($requestData);

        if(isset($requestData['permissions']))
        {
            $this->setPermissions($role, $requestData['permissions']);
        }

        return redirect('admin/roles')->with('flash_message', 'Rol updated!');
    }
    
    public function updatePermissions(Request $request, $id)
    {
        Log::info('rolepermissions');
        Log::info('ID '+ $id);
    
        $this->validate($request, [
            'permissions' => 'required'
        ]);
        
        $requestData = $request->all();
        
        $role = Role::findOrFail($id);
        
        //Role Admin Cannot be modify
        if($this->isAdmin($role))
        {
            return redirect('admin/roles')->with('flash_message_error', 'Rol admin cannot be modified!');
        }

        $this->setPermissions($role, $requestData['permissions']);

        return redirect('admin/roles')->with('flash_message', 'Rol updated!');
    }

    public function setPermissions(Role $role, $permissionsArray)
    {
        // Update Rol Permissions
        $allowPermissions = [];
        foreach ($permissionsArray AS $permissionId => $allowed)
        {
            if($allowed === 'on' or $allowed === true or $allowed==='true')
            {
                array_push($allowPermissions, $permissionId);
            }
        }


        $role->permissions()->whereIn('id',$allowPermissions)->update(['allow' => true]);
        $role->permissions()->whereNotIn('id',$allowPermissions)->update(['allow' => false]);

        return redirect('admin/roles')->with('flash_message', 'Rol updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
    
        if($role->name == "admin")
        {
            return redirect('admin/roles')->with('flash_message_error', 'Rol admin cannot be delete!');
        }

        RolePermission::where('role_id',$id)->delete();
        Role::destroy($id);

        return redirect('admin/roles')->with('flash_message', 'Rol deleted!');
    }

    public function getPermissionsListWithRole($roleId)
    {
        $permisionList = $this->getPermissionsList();

        foreach ($permisionList AS $item)
        {
            $item['role_id'] = $roleId;
        }

        return $permisionList;
    }

    public function isAdmin($role)
    {
        if($role->name === "admin")
        {
            return true;
        }

        return false;
    }

}
