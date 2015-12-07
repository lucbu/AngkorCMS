<?php namespace AngkorCMS\Listing\Repositories\Contracts;

interface AngkorCMSListItemRepositoryInterface {

	public function all();
	public function store();
	public function destroy($id);

}