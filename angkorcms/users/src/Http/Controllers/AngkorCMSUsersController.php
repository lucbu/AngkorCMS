<?php namespace AngkorCMS\Users\Http\Controllers;

use AngkorCMS\Users\Http\Requests\UserRequest;
use AngkorCMS\Users\Http\Requests\UserUpdateRequest;
use AngkorCMS\Users\Repositories\Eloquent\AngkorCMSUserRepository;
use Redirect;

class AngkorCMSUsersController extends AngkorCMSUsersBaseController {

	protected $repository;

	public function __construct(AngkorCMSUserRepository $repository) {
		$this->repository = $repository;
	}

	public function index() {
		$data = array('users' => $this->repository->index(10));
		return view('angkorcms/users/index')->with($data);
	}

	public function create() {
		return view('angkorcms/users/create');
	}

	public function store(UserRequest $request) {
		$this->repository->store();
		return Redirect::route('angkorcmsusers.index')
			->with('ok', 'L\'utilisateur a bien été créé.');
	}

	public function show($id) {
		$user = $this->repository->show($id);
		if (is_null($user)) {
			return Redirect::route('angkorcmsusers.index')->with('error', 'The user doesn\'t exist.');
		}
		return view('angkorcms/users/show', $user);
	}

	public function edit($id) {
		$user = $this->repository->show($id);
		if (is_null($user)) {
			return Redirect::route('angkorcmsusers.index')->with('error', 'The user doesn\'t exist.');
		}
		return view('angkorcms/users/edit', $user);
	}

	public function update(UserUpdateRequest $request, $id) {
		$user = $this->repository->update($id);
		if (!$user) {
			return Redirect::route('angkorcmsusers.index')->with('error', 'The user doesn\'t exist.');
		}
		return Redirect::route('angkorcmsusers.index')
			->with('ok', 'L\'utilisateur a bien été modifié.');
	}

	public function destroy($id) {
		$user = $this->repository->destroy($id);
		if (!$user) {
			return Redirect::route('angkorcmsusers.index')->with('error', 'The user doesn\'t exist.');
		}
		return Redirect::back();
	}
}