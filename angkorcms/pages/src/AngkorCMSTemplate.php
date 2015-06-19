<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSTemplate extends Model {

	protected $table = 'angkorcms_templates';

	protected $fillable = ['name'];

	public $timestamps = false;

	public function blocks() {
		return $this->hasMany('AngkorCMS\Pages\AngkorCMSBlock', 'template_id', 'id');
	}

	public function themes() {
		return $this->hasMany('AngkorCMS\Pages\AngkorCMSTheme', 'template_id', 'id');
	}
}
