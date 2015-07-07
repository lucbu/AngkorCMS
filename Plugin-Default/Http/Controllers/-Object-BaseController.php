<?php namespace -namespace-\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class -Object-BaseController extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function __construct() {
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
}
