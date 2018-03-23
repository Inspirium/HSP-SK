<?php
namespace Inspirium\Http\Controllers\Api;

use Inspirium\BookProposition\Models\BookProposition;
use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\FileManagement\File;

class HomeController extends Controller {
	public function home() {
		$total = BookProposition::count();
		$approval = BookProposition::where('status', 'requested')->count();
		$active = BookProposition::where('status', 'unfinished')->get();
		$latest = [];
		$order = [
			'translation', 'technical_preparation', 'proofreading', 'additional_materials', 'reviews', 'lecture', 'technical_correction', 'final_review',
			'cover_design', 'layout_design',
			'first_block_layout', 'cover', 'layout', 'first_revision', 'correction', 'correction_input', 'revisions',
			'print_proof', 'print_proof_correction',
			'print'
		];
		foreach ($active as $one) {
			$steps = $one->step_status;
			if (is_array($steps)) {
				foreach ( $steps as $step => $value ) {
					if (isset($latest[$one->id])) {
						$new_key = array_search( $step, $order );
						$old_key = array_search( $latest[ $one->id ], $order );
						if ( $new_key > $old_key ) {
							$latest[ $one->id ] = $step;
						}
					}
					else {
						$latest[$one->id] = $step;
					}
				}
			}

		}
		$totals = [
			'text' => 0,
			'design' => 0,
			'layout' => 0,
			'prep' => 0,
			'print' => 0
		];
		foreach ($latest as $one) {
			$key = array_search($one, $order);
			if ($key < 8) {
				$totals['text']++;
			}
			else if ($key < 10) {
				$totals['design']++;
			}
			else if ($key<17) {
				$totals['layout']++;
			}
			else if ($key<19) {
				$totals['prep']++;
			}
			else {
				$totals['print']++;
			}
		}
		return response()->json([[$total, $approval, $totals['text'], $totals['design'], $totals['layout'], $totals['prep'], $totals['print']]]);
	}
}