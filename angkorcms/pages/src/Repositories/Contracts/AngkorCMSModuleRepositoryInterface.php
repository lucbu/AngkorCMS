<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSModuleRepositoryInterface {

	public function all();
	public function store();
	public function update($id);
	public function destroy($id);

}