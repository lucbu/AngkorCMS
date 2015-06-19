<?php namespace AngkorCMS\Content\Repositories\Contracts;

interface AngkorCMSContentRepositoryInterface {

	public function all();
	public function store($id_module);
	public function getByModule($id_module);
	public function update($id);
	public function destroy($id);

}