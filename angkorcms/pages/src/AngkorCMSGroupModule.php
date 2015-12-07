<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSGroupModule extends Model {

	protected $table = 'angkorcms_groupsmodules';

	protected $fillable = ['module_id'];

	public $timestamps = false;

	public function modules() {
		return $this->HasMany('AngkorCMS\Pages\AngkorCMSModuleGroupModule', 'groupmodule_id', 'id')->orderBy('position');
	}
}
