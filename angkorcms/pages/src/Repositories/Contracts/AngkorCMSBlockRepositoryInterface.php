<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSBlockRepositoryInterface {

	public function store();
	public function update($id);
	public function destroy($id);

}