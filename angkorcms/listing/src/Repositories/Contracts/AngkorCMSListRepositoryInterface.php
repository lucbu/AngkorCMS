<?php namespace AngkorCMS\Listing\Repositories\Contracts;

interface AngkorCMSListRepositoryInterface {

	public function all();
	public function store($id_module);
	public function getByModule($id_module);
	public function update($id);
	public function destroy($id);
	
}