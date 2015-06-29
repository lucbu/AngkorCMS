<?php namespace AngkorCMS\Medias\Repositories\Eloquent;

use AngkorCMS\Medias\AngkorCMSFolder;
use AngkorCMS\Medias\Repositories\Contracts\AngkorCMSFolderRepositoryInterface;
use Config;
use Input;

class AngkorCMSFolderRepository implements AngkorCMSFolderRepositoryInterface {

	protected $path;

	public function __construct() {
		$this->path = Config::get('image.path');
	}

	public function store() {
		$folderid = null;
		if (is_numeric(Input::get('folder_id'))) {
			$folderid = Input::get('folder_id');
		}

		$folder = AngkorCMSFolder::create(array(
			'name' => Input::get('name'),
			'folder_parent_id' => $folderid,
		));

		return $folder;
	}

	public function changeFolder() {
		$folder = AngkorCMSFolder::find(Input::get('folder_id'));
		$parent_folder_id = null;
		if (is_numeric(Input::get('parent_folder_id'))) {
			if (Input::get('folder_id') == Input::get('parent_folder_id')) {
				return false;
			}
			$parent_folder_id = Input::get('parent_folder_id');
		}
		$folder->folder_parent_id = $parent_folder_id;
		return $folder->save();
	}

	public function getById($id) {
		$folder = AngkorCMSFolder::find($id);
		return compact('folder');
	}

	public function getFullFolders() {
		$folders = AngkorCMSFolder::with('images')->get();
		return compact('folders');
	}

	public function getFullById($id) {
		$folder = AngkorCMSFolder::with('folderParent', 'childs', 'images')
			->find($id);
		return compact('folder');
	}

	public function getListByFolder($folderid = null) {
		$folders = AngkorCMSFolder::where('folder_parent_id', '=', $folderid)->orderBy('name')->get();
		return compact('folders');
	}

	public function destroy($id) {
		$folder = AngkorCMSFolder::find($id);
		$folder->delete();
		return true;
	}
}