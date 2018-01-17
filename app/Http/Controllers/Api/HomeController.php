<?php
namespace Inspirium\Http\Controllers\Api;

use Inspirium\BookProposition\Models\BookProposition;
use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\FileManagement\File;

class HomeController extends Controller {
	public function home() {
		$total = BookProposition::count();
		$approval = BookProposition::where('status', 'requested')->count();
		$files = \DB::table('fileables')->where('fileable_type', 'Inspirium\BookProposition\Models\BookProposition')->join('propositions', 'id', 'fileable_id')->whereNull('propositions.deleted_at')->get(['fileable_id', 'type']);
		$latest = [];
		$order = [
			'translation', 'technical_preparation', 'proofreading', 'additional_materials', 'reviews', 'lecture', 'technical_correction', 'final_review',
			'cover_design', 'layout_design',
			'first_block_layout', 'cover', 'layout', 'first_revision', 'correction', 'correction_input', 'revisions',
			'print_proof', 'print_proof_correction',
			'print'
		];
		foreach ($files as $file) {
			if (isset($latest[$file->fileable_id])) {
				$new_key = array_search($file->type, $order);
				$old_key = array_search($latest[$file->fileable_id], $order);
				if ($new_key>$old_key) {
					$latest[$file->fileable_id] = $file->type;
				}
			}
			else {
				$latest[$file->fileable_id] = $file->type;
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