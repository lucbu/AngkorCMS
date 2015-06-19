<?php namespace AngkorCMS\MultiLanguages\Http\ViewComposers;

use AngkorCMS\MultiLanguages\Repositories\Eloquent\AngkorCMSLangRepository;
use Illuminate\Contracts\View\View;

class ShowComposer {

	protected $lang_repository;

	public function __construct(AngkorCMSLangRepository $lang_repository) {
		$this->lang_repository = $lang_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		//Set languages to the $data
		$parameters = $viewParameters['parameters'];
		$data = array('langs' => $this->lang_repository->all());

		// Agregate and Send the data to the view
		$data = array_merge($data, $viewParameters);
		$view->with($data);
	}
}