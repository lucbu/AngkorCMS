<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSPageTrans extends Model {

	protected $table = 'angkorcms_pages_trans';

	protected $fillable = ['slug', 'title', 'page_id', 'lang_id'];

	public $timestamps = false;

	public function page() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSPage', 'page_id', 'id');
	}

	public function lang() {
		return $this->belongsTo('AngkorCMS\MultiLanguages\AngkorCMSLang', 'lang_id', 'id');
	}

	public function blocks() {
		return $this->hasMany('AngkorCMS\Pages\AngkorCMSPageTransBlock', 'page_trans_id', 'id');
	}
}