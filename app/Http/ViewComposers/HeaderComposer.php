<?php

namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer {

	private $request;

	public function __construct(Request $request) {
		$this->request = $request;
	}

	/**
	 * Bind data to the view.
	 *
	 * @param View $view
	 *
	 * @return void
	 */
	public function compose(View $view)
	{
		$active = '';
		$url = $this->request->getRequestUri();

		if (strpos($url, 'user') !== false) {
			$active = 'administration';
		}
		else if (strpos($url, 'proposition') !== false) {
			$active = 'proposition';
		}
		else if (strpos($url, 'hr') !== false) {
			$active = 'hr';
		}
		$view->with('active', $active);
	}
}