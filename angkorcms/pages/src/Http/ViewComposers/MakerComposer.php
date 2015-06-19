<?php namespace AngkorCMS\Pages\Http\ViewComposers;

use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSGroupModuleRepository;
use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSModuleRepository;
use Illuminate\Contracts\View\View;

class MakerComposer {

	protected $repository;
	protected $module_repository;

	public function __construct(AngkorCMSGroupModuleRepository $repository, AngkorCMSModuleRepository $module_repository) {
		$this->repository = $repository;
		$this->module_repository = $module_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		//Get the data
		$group_module = $this->repository->getByModule($viewParameters['module_id']);
		$modules = $this->module_repository->all();

		// Agregate and Send the data to the view
		$data = array_merge(array('group_module' => $group_module, 'modules' => $modules));
		$view->with($data);
	}
}