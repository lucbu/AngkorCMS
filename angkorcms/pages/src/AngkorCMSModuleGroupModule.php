<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSModuleGroupModule extends Model {

	protected $table = 'angkorcms_modules_groupsmodules';

	protected $fillable = ['groupmodule_id', 'module_id'];

	public $timestamps = false;

	public function module() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSModule', 'module_id', 'id');
	}
}
