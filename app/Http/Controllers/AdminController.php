<?php namespace App\Http\Controllers;

use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSPageRepository;
use App\Http\Controllers\Controller;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex(AngkorCMSPageRepository $page_repository) {
		$pages = $page_repository->allFull();
		return view('admin/index', $pages);
	}
}
