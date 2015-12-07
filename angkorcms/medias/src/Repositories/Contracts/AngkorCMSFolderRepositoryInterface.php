<?php namespace AngkorCMS\Medias\Repositories\Contracts;

interface AngkorCMSFolderRepositoryInterface {

	public function store();
	public function getById($id);
	public function getListByFolder($folderid);
	public function destroy($id);

}