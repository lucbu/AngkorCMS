<?php namespace AngkorCMS\Medias;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSFolder extends Model {

	protected $table = 'angkorcms_folders';

	protected $fillable = ['name', 'folder_parent_id'];

	public $timestamps = false;

	public function folderParent() {
		return $this->belongsTo('AngkorCMS\Medias\AngkorCMSFolder', 'folder_parent_id', 'id');
	}

	public function childs() {
		return $this->hasMany('AngkorCMS\Medias\AngkorCMSFolder', 'folder_parent_id', 'id');
	}

	public function images() {
		return $this->hasMany('AngkorCMS\Medias\AngkorCMSImage', 'folder_id', 'id');
	}
}
