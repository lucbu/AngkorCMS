<?php namespace AngkorCMS\Maps;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSMap extends Model {

	protected $table = 'angkorcms_maps';

	public $timestamps = false;

	protected $fillable = ['zoom', 'lat', 'lng', 'latMarker', 'lngMarker', 'name', 'module_id'];

	public function module() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSModule', 'module_id', 'id');
	}
}