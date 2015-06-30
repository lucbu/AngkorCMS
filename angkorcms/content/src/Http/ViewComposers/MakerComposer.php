<?php namespace AngkorCMS\Content\Http\ViewComposers;

use AngkorCMS\Content\Repositories\Eloquent\AngkorCMSContentRepository;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSFolderRepository;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSImageRepository;
use Illuminate\Contracts\View\View;

class MakerComposer {

	protected $content_repository;
	protected $folderrepository;
	protected $imagerepository;

	public function __construct(AngkorCMSContentRepository $content_repository, AngkorCMSFolderRepository $folderrepository, AngkorCMSImageRepository $imagerepository) {
		$this->content_repository = $content_repository;
		$this->folderrepository = $folderrepository;
		$this->imagerepository = $imagerepository;
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