<?php namespace -namespace-\Http\ViewComposers;

use Illuminate\Contracts\View\View;

class MakerComposer {

	protected $repository;

	public function __construct(Repository $repository) {
		$this->repository = $repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		//Get the data
		// --- Example : $this->repository->getByModule($viewParameters['module_id'];

		// Agregate and Send the data to the view
		$data = array_merge();
		$view->with($data);
	}
}