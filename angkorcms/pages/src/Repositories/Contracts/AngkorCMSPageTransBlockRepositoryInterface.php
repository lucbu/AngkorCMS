<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSPageTransBlockRepositoryInterface {

	public function store();
	public function destroy($id);

}