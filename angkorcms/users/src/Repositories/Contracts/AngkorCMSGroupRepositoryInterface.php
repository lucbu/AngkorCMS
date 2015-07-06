<?php namespace AngkorCMS\Users\Repositories\Contracts;

interface AngkorCMSGroupRepositoryInterface {

	public function index();
	public function store();
	public function show($id);
	public function edit($id);
	public function update($id);
	public function destroy($id);

}
