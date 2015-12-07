<?php namespace AngkorCMS\Maps\Http\ViewComposers;

use AngkorCMS\Maps\Repositories\Eloquent\AngkorCMSMapRepository;
use Illuminate\Contracts\View\View;

class MakerComposer {

	protected $map_repository;

	public function __construct(AngkorCMSMapRepository $map_repository) {
		$this->map_repository = $map_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		//Get the data
		$map = $this->map_repository->getByModule($viewParameters['module_id']);

		// Agregate and Send the data to the view
		$data = array('map' => $map);
		$view->with($data);
	}
}