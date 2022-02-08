<?php

namespace Inspirium\Http\Controllers;

use Illuminate\Http\Request;
use Inspirium\Models\WorkOrder;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workOrder = WorkOrder::create([
            'proposition' => $request->input('proposition'),
            'task_content' => $request->input('task_content'),
            'sifnatures' => $request->input('signatures'),
            'assagnee' => $request->input('assagnee'),
            'title' => $request->input('title'),
            'edition' => $request->input('edition'),
            'project_number' => $request->input('project_number'),
            'project_subnumber' => $request->input('project_subnumber'),
            'assigner' => $request->input('assigner'),
            'type' => $request->input('type'),
            'status' => $request->input('status'),
            'deadline' => $request->input('deadline'),
            'priority' => $request->input('priority'),
            'files' => $request->input('files'),
            'date_created' => $request->input('date_created'),
            'date_finished' => $request->input('date_finished'),
            'note' => $request->input('note'),
        ]);

        return response()->json($workOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Inspirium\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        return response()->json($workOrder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Inspirium\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkOrder $workOrder)
    {

        $validated = $request->validate([
            'date' => 'required',
            'with' => 'required'
        ]);

        $workOrder->dates = $validated->dates;
        $workOrder->with = $validated->with;

        $workOrder->save();

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Inspirium\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        $workOrder->delete();

        return response()->noContent(); 
    }
}
