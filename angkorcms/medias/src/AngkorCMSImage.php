<?php namespace AngkorCMS\Medias;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSImage extends Model {

	protected $table = 'angkorcms_images';

	public $timestamps = false;

	protected $fillable = ['name', 'description', 'path', 'filename', 'extension', 'folder_id'];

	public function folder() {
		return $this->belongsTo('AngkorCMS\Medias\AngkorCMSFolder', 'folder_id', 'id');
	}

	public function url() {
		return asset($this->path . '/' . $this->filename . '.' . $this->extension);
	}

	public function path() {
		return $this->path . '/' . $this->filename . '.' . $this->extension;
	}
}
