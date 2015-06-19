<?php namespace AngkorCMS\MultiLanguages;

use Illuminate\Database\Eloquent\Model;
use Config;

class AngkorCMSLang extends Model {

	protected $table = 'angkorcms_langs';

	protected $fillable = ['code', 'description', 'image_id'];

	public $timestamps = false;

	public function image() {
		return $this->belongsTo(Config::get('angkorcmsmultilanguages.image_model'), 'image_id', Config::get('angkorcmsmultilanguages.image_id'));
	}
}
