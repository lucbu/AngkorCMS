<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex() {
		return view('admin/index');
	}
}
