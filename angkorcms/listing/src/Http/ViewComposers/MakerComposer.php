<?php namespace AngkorCMS\Listing\Http\ViewComposers;

use AngkorCMS\Listing\Repositories\Eloquent\AngkorCMSListRepository;
use Illuminate\Contracts\View\View;

class MakerComposer {

	protected $list_repository;

	public function __construct(AngkorCMSListRepository $list_repository) {
		$this->list_repository = $list_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		//Get the data
		$list = $this->list_repository->getByModule($viewParameters['module_id']);

		// Agregate and Send the data to the view
		$data = array('list' => $list);
		$view->with($data);
	}
}