<?php namespace AngkorCMS\News\Http\ViewComposers;

use AngkorCMS\News\Repositories\Eloquent\AngkorCMSPostRepository;
use Illuminate\Contracts\View\View;

class ShowComposer {

	protected $post_repository;

	public function __construct(AngkorCMSPostRepository $post_repository) {
		$this->post_repository = $post_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		$parameters = $viewParameters['parameters'];
		$data = array();

		if (count($parameters) >= 2 && isset($parameters['post']) && is_numeric($parameters['post'])) {
			$post_id = intval($parameters['post']);
			$data = $this->getPost($post_id, $viewParameters);
		} else {
			$data = $this->getList($viewParameters);
		}

		// Agregate and Send the data to the view
		$data = array_merge($data, $viewParameters);
		$view->with($data);
	}

	private function getList($viewParameters) {
		$nb_post = 5;
		if (isset($viewParameters['attr']['nb_post']) && is_integer(intval($viewParameters['attr']['nb_post']))) {
			$nb_post = intval($viewParameters['attr']['nb_post']);
		}
		return array_merge(array('mode' => 'list'), $this->post_repository->paginate($nb_post));
	}

	private function getPost($id, $viewParameters) {
		$post = $this->post_repository->read($id);
		if ($post != null) {
			return array_merge(array('mode' => 'read'), compact('post'));
		} else {
			return $this->getList($viewParameters);
		}
	}
}