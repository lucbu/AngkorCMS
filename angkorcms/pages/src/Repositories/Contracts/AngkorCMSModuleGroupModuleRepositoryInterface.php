<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSModuleGroupModuleRepositoryInterface {

	public function all();
	public function getById($id);
	public function store();
	public function reorder();
	public function destroy($id);

}