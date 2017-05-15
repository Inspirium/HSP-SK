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
		$special = '';
		$url = $this->request->getRequestUri();

		if (strpos($url, 'user') !== false) {
			$active = 'administration';
		}
		else if (strpos($url, 'proposition') !== false) {
			$active = 'proposition';
			if (strpos($url, 'edit') !== false) {
				$special = 'proposition';

			}
		}
		else if (strpos($url, 'hr') !== false) {
			$active = 'hr';
		}
		$url = explode('/', $url);
		$view->with(['level1' => isset($url[1])?$url[1]:'', 'level2' => isset($url[2])?$url[2]:'', 'level3' => isset($url[3])?$url[3]:'', 'special' => $special]);
	}
}