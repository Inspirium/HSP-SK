<?php

namespace Inspirium\Http\Controllers\HumanResources;

use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Models\HumanResources\Department;

class DepartmentController extends Controller {

    public function showDepartments() {
    	$user = \Auth::user();
        $elements = Department::all();
        $columns = [
            'name' => [ 'title' => __('Name') ],
        ];
        $strings = [
            'title' => __('Departments'),
            'add_new' => __('Add New Department'),
        ];
        $links = [
            'add_new' => $user->hasRole('department_create')?'/human_resources/department/edit':'',
            'edit' => $user->hasRole('department_update')?'/human_resources/department/:id/edit/':'',
            'delete' => $user->hasRole('department_delete')?'/human_resources/department/:id/delete/':''
        ];
        return view(config('app.template') . '::vue.table-search', compact( 'elements', 'columns', 'strings', 'links' ));
    }

    public function showDepartment($id = null) {
        $department = Department::firstOrNew(['id' => $id]);
        return view(config('app.template').'::hr.departments.edit', ['department' => $department]);
    }

    public function submitDepartment(Request $request, $id = null) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $department = Department::updateOrCreate(['id' => $id], ['name' => $request->input('name')]);

        return redirect('hr/deparments');
    }
}
