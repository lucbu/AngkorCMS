<?php namespace AngkorCMS\Users\Http\Controllers;

use AngkorCMS\Users\Http\Requests\GroupRequest;
use AngkorCMS\Users\Repositories\Eloquent\AngkorCMSGroupRepository;
use AngkorCMS\Users\Repositories\Eloquent\AngkorCMSUserRepository;
use Redirect;

class AngkorCMSGroupController extends AngkorCMSUsersBaseController {

	protected $repository;

	public function __construct(AngkorCMSGroupRepository $repository) {
		$this->repository = $repository;
	}

	public function create() {
		$data = array('groups' => $this->repository->allGroupShort());
		return view('angkorcms/users/groups/create', $data);
	}

	public function store(GroupRequest $request) {
		$this->repository->store();
		return Redirect::route('angkorcmsusers.index')
			->with('ok', 'L\'utilisateur a bien été créé.');
	}

	public function show($id) {
		$group = $this->repository->show($id);
		if (is_null($group)) {
			return Redirect::route('angkorcmsgroups.index')->with('error', 'The user doesn\'t exist.');
		}
		$data = array_merge($group);
		return view('angkorcms/users/groups/show', $data);
	}

	public function edit($id) {
		$group = $this->repository->show($id);
		if (is_null($group)) {
			return Redirect::route('angkorcmsgroups.index')->with('error', 'The user doesn\'t exist.');
		}
		$data = array_merge($group, array('groups' => $this->repository->allGroupShort()));
		return view('angkorcms/users/groups/edit', $data);
	}

	public function update(GroupRequest $request, $id) {
		$group = $this->repository->update($id);
		if (!$group) {
			return Redirect::route('angkorcmsgroups.index')->with('error', 'The user doesn\'t exist.');
		}
		return Redirect::route('angkorcmsusers.index')
			->with('ok', 'L\'utilisateur a bien été modifié.');
	}

	public function destroy($id) {
		$group = $this->repository->destroy($id);
		if (!$group) {
			return Redirect::route('angkorcmsusers.index')->with('error', 'The user doesn\'t exist.');
		}
		return Redirect::back();
	}
}
