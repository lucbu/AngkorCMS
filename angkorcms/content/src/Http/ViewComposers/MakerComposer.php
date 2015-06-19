<?php namespace AngkorCMS\Content\Http\ViewComposers;

use AngkorCMS\Content\Repositories\Eloquent\AngkorCMSContentRepository;
use Illuminate\Contracts\View\View;

class MakerComposer {

	protected $content_repository;

	public function __construct(AngkorCMSContentRepository $content_repository) {
		$this->content_repository = $content_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();
		//Get the data
		$content = $this->content_repository->getByModule($viewParameters['module_id']);
		
		// Agregate and Send the data to the view
		$data = array_merge(array('content' => $content));
		$view->with($data);
	}
}