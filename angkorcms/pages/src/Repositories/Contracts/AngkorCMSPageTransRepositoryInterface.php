<?php namespace AngkorCMS\Pages\Repositories\Contracts;

interface AngkorCMSPageTransRepositoryInterface {

	public function store();
	public function update($id);
	public function destroy($id);

}