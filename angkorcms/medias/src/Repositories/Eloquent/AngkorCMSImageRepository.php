<?php namespace AngkorCMS\Medias\Repositories\Eloquent;

use AngkorCMS\Medias\AngkorCMSImage;
use AngkorCMS\Medias\Repositories\Contracts\AngkorCMSImageRepositoryInterface;
use Config;
use File;
use Illuminate\Support\Str;
use Input;

class AngkorCMSImageRepository implements AngkorCMSImageRepositoryInterface {

	protected $path;

	public function __construct() {
		$this->path = Config::get('angkorcmsmedias.path');
	}

	public function store() {

		$file = Input::file('image');
		$folderid = null;
		if (is_numeric(Input::get('folder_id'))) {
			$folderid = Input::get('folder_id');
		}

		$extension = $file->getClientOriginalExtension();
		$nom = '';
		do {
			$nom = Str::random(10);
		} while (file_exists($this->path . '/' . $nom . '.' . $extension));

		if ($file->move($this->path, $nom . '.' . $extension)) {
			$image = AngkorCMSImage::create(array(
				'name' => $file->getClientOriginalName(),
				'path' => $this->path,
				'filename' => $nom,
				'extension' => $extension,
				'folder_id' => $folderid,
			));
			return $image;
		}
		return false;
	}

	public function changeFolder() {
		$image = AngkorCMSImage::find(Input::get('image_id'));
		$folderid = null;
		if (is_numeric(Input::get('folder_id'))) {
			$folderid = Input::get('folder_id');
		}
		$image->folder_id = $folderid;

		return $image->save();
	}

	public function getById($id) {
		$image = AngkorCMSImage::find($id);
		return compact('image');
	}

	public function getListByFolder($folderid = null) {
		$images = AngkorCMSImage::where('folder_id', '=', $folderid)->orderBy('name')->get();
		return compact('images');
	}

	public function destroy($id) {
		$image = AngkorCMSImage::find($id);
		$path = $image->path . '/' . $image->filename . '.' . $image->extension;
		if (file_exists($path)) {
			if (File::delete($path)) {
				$image->delete();
				return true;
			}
		}
		return false;
	}
}