<?php

namespace Inspirium\Http\Controllers\HumanResources;

use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Models\HumanResources\Department;

class DepartmentController extends Controller {

    public function showDepartments() {
        $elements = Department::all();
        $columns = [
            'name' => [ 'title' => 'Name' ],
        ];
        $strings = [
            'title' => 'Departments',
            'add_new' => 'Add New Department',
        ];
        $links = [
            'add_new' => '/human_resources/department/edit',
            'edit' => '/human_resources/department/:id/edit/',
            'delete' => '/human_resources/department/:id/delete/'
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
