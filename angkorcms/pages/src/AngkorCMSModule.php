<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSModule extends Model {

	protected $table = 'angkorcms_modules';

	protected $fillable = ['title', 'nature', 'lang_id', 'name'];

	public $timestamps = false;

	public function lang() {
		return $this->belongsTo('AngkorCMS\MultiLanguages\AngkorCMSLang', 'lang_id', 'id');
	}
}
