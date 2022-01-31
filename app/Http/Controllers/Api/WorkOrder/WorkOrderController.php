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
        $workOrder = new WorkOrder;

        $workOrder->dates = $request->dates;

        $workOrder->save();

        return response()->noContent();
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
        $workOrder->dates = $request->dates;

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
