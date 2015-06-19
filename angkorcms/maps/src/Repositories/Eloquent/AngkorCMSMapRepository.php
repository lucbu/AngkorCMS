<?php namespace AngkorCMS\Maps\Repositories\Eloquent;

use AngkorCMS\Maps\AngkorCMSMap;
use AngkorCMS\Maps\Repositories\Contracts\AngkorCMSMapRepositoryInterface;
use Input;

class AngkorCMSMapRepository implements AngkorCMSMapRepositoryInterface {

	public function all() {
		$maps = AngkorCMSMap::orderBy('id', 'DESC')
			->get();
		return compact('maps');
	}

	public function getByModule($id_module) {
		return AngkorCMSMap::where('module_id', $id_module)->first();
	}

	public function store($id_module) {
		$map = AngkorCMSMap::create(array(
			'name' => '',
			'lat' => 25,
			'lng' => 0,
			'latMarker' => 25,
			'lngMarker' => 0,
			'zoom' => 3,
			'module_id' => $id_module,
		));

		return $map;
	}

	public function update($id) {
		$map = AngkorCMSMap::find($id);
		if ($map == null) {
			return false;
		}
		$map->name = Input::get('name');
		$map->lat = Input::get('lat');
		$map->lng = Input::get('lng');
		$map->latMarker = Input::get('latMarker');
		$map->lngMarker = Input::get('lngMarker');
		$map->zoom = Input::get('zoom');
		$map->save();
		return $map;
	}

	public function destroy($id) {
		$map = AngkorCMSMap::find($id);
		if ($map == null) {
			return false;
		}
		$map->delete();
		return true;
	}
}