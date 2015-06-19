<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSGroupModuleRepositoryInterface {

	public function all();
	public function store($id_module);
	public function getByModule($id_module);
	public function update($id);
	public function destroy($id);

}