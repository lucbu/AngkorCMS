<?php namespace AngkorCMS\Users\Http\ViewComposers;

use AngkorCMS\Users\Repositories\Eloquent\AngkorCMSUserRepository;
use Illuminate\Contracts\View\View;

class ShowProfileComposer {

	protected $user_repository;

	public function __construct(AngkorCMSUserRepository $user_repository) {
		$this->user_repository = $user_repository;
	}

	public function compose(View $view) {
		//Get the data from the view
		$viewParameters = $view->getData();

		$parameters = $viewParameters['parameters'];
		$data = array();
		if (count($parameters) >= 2 && isset($parameters['profile']) && is_numeric($parameters['profile'])) {
			$user_id = intval($parameters['profile']);
			$user = $this->user_repository->show($user_id);
			if ($user != null) {
				$data = array_merge(array('mode' => 'show'), $user);
			}
		} else {
			$data = array('mode' => 'list', 'users' => $this->user_repository->index(10));
		}

		// Agregate and Send the data to the view
		$data = array_merge($data, $viewParameters);
		$view->with($data);
	}
}