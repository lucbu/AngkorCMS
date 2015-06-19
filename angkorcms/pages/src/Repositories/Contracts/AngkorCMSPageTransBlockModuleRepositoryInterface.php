<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSPageTransBlockModuleRepositoryInterface {

	public function store($pageTransBlock);
	public function destroy($id);

}