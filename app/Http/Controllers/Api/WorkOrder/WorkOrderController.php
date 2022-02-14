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
        $workOrder = new WorkOrder();


        $workOrder->proposition()->associate($proposition);

        $workOrder->signatures()->associate();

        if (count($request->input('users'))) {
			$assignee = Employee::find( $request->input( 'users' )[0]['id'] );
		}
		else {
			$assignee = Auth::user();
		}
		$workOrder->assignee()->associate($assignee);

        $workOrder->title = $request->input('title');

        $workOrder->edition = $request->input('edition');

        $workOrder->assigner()->associate(Auth::user());

        $workOrder->type = $request->input('type');

        $workOrder->status = 'new';

        if ($request->input('deadline')) {
			$deadline       = Carbon::createFromFormat( '!d. m. Y.', $request->input( 'deadline' ) );
			$workOrder->deadline = $deadline->toDateTimeString();
		}
		else {
			$workOrder->deadline = null;
		}

		$workOrder->priority = $request->input('priority')?$request->input('priority'):'low';

        $workOrder->note = $request->input('note');

        $workOrder->save();

        $final = collect($request->input('files.final'))->mapWithKeys(function($el) {
			return [$el['id'] => ['is_final' => true]];
		});
		$initial = collect($request->input('files.initial'))->mapWithKeys(function($el) {
			return [$el['id'] => ['is_final' => false]];
		});
		$initial = $initial->all();
		$final = $final->all();
		$workOrder->documents()->sync($initial + $final);

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
