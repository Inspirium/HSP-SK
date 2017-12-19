<?php

namespace Inspirium\Http\Controllers\HumanResources;

use Illuminate\Http\Request;
use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\HumanResources\Role;

class RoleController extends Controller {

    public function showRoles() {
	    $user = \Auth::user();
        $elements = Role::all();
        $columns = [
            'name' => [ 'title' => __('Name') ],
            'description' => [ 'title' => __('Description') ]
        ];
        $strings = [
            'title' => __('Roles'),
            'add_new' => __('Add New Roles'),
        ];
        $links = [
            'add_new' => $user->hasRole('role_create')?'human_resources/role/edit':'',
            'edit' => $user->hasRole('role_update')?'human_resources/role/:id/edit/':'',
            'delete' => $user->hasRole('role_delete')?'human_resources/role/:id/delete/':''
        ];
        return view(config('app.template') . '::vue.table-search', compact( 'elements', 'columns', 'strings', 'links' ));
    }

    public function showRole(Role $role) {
        return view(config('app.template') . '::user.role.edit', ['role' => $role]);
    }

	public function showCreateRole() {
    	$role = new Role();
		return view(config('app.template') . '::user.role.edit', ['role' => $role]);
	}

    public function createRole(Request $request) {
	    $this->validate($request, [
		    'name' => 'required',
		    'description' => 'required'
	    ]);

	    $role = Role::create($request->all());

	    return redirect('human_resources/role/'.$role->id.'/edit');
    }

    public function submitRole(Request $request, Role $role) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $role->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
        return redirect('human_resources/roles');
    }

    public function deleteRole($id) {
        Role::destroy($id);
        return redirect('administration/roles');
    }
}
