<?php namespace AngkorCMS\Listing;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSList extends Model {

	protected $table = 'angkorcms_lists';

	public $timestamps = false;

	protected $fillable = ['module_id'];

	public function module() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSModule', 'module_id', 'id');
	}
	
	public function items() {
		return $this->hasMany('AngkorCMS\Listing\AngkorCMSListItem', 'list_id', 'id')->orderBy('position');
	}
}