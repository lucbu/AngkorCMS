<?php namespace AngkorCMS\Users;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSGroup extends Model {

	protected $table = 'angkorcms_groups';

	public $timestamps = false;

	protected $fillable = ['group_parent_id', 'name'];

	public function child()
	{
		return $this->hasMany('AngkorCMS\Users\AngkorCMSGroup', 'group_parent_id', 'id');
	}

	public function children()
	{
		return $this->child()->with('children');
	}

	public function parent()
	{
		return $this->belongsTo('AngkorCMS\Users\AngkorCMSGroup', 'group_parent_id', 'id');
	}

	public function parentRecursive()
	{
		return $this->parent()->with('parentRecursive');
	}

	public function fullArborescence(){
		$arborescence = array();
		$current_group = $this;
		while($current_group != null){
			$arborescence[] = $current_group;
			$current_group = $current_group->parent;
		}
		return $arborescence;
	}

	public function users() {
		return $this->hasMany('App\User', 'group_id', 'id');
	}
}
