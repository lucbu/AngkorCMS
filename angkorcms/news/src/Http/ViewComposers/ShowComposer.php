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

		if (count($parameters) >= 2 && isset($parameters['post'])) {
			if (is_numeric($parameters['post'])) {
				$post_id = intval($parameters['post']);
				$data = $this->getPostById($post_id, $viewParameters);
			} else {
				$post_slug = $parameters['post'];
				$data = $this->getPostBySlug($post_slug, $viewParameters);
			}
		} elseif (count($parameters) >= 2 && isset($parameters['tag'])) {
			$data = $this->getListTag($parameters['tag'], $viewParameters);
		} else {
			$data = $this->getList($viewParameters);
		}

		// Agregate and Send the data to the view
		$data = array_merge($data, $viewParameters);
		$view->with($data);
	}

	private function getListTag($tag, $viewParameters) {
		$nb_post = $this->getNbPost($viewParameters);
		return array_merge(array('mode' => 'list', "tag" => $tag), $this->post_repository->tag($tag, $nb_post));
	}

	private function getList($viewParameters) {
		$nb_post = $this->getNbPost($viewParameters);
		return array_merge(array('mode' => 'list'), $this->post_repository->paginateByLang($nb_post));
	}

	private function getNbPost($viewParameters) {
		$nb_post = 5;
		if (isset($viewParameters['attr']['nb_post']) && is_integer(intval($viewParameters['attr']['nb_post']))) {
			$nb_post = intval($viewParameters['attr']['nb_post']);
		}
		return $nb_post;
	}

	private function getPost($post, $viewParameters) {
		if ($post != null) {
			return array_merge(array('mode' => 'read'), compact('post'));
		} else {
			return $this->getList($viewParameters);
		}
	}

	private function getPostById($id, $viewParameters) {
		$post = $this->post_repository->read($id);
		return $this->getPost($post, $viewParameters);
	}

	private function getPostBySlug($slug, $viewParameters) {
		$post = $this->post_repository->getBySlug($slug);
		return $this->getPost($post, $viewParameters);
	}
}