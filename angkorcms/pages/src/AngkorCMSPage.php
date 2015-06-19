<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSPage extends Model {

	protected $table = 'angkorcms_pages';

	protected $fillable = ['name', 'accessible', 'style', 'theme_id'];

	public $timestamps = false;

	public function translations() {
		return $this->hasMany('AngkorCMS\Pages\AngkorCMSPageTrans', 'page_id', 'id');
	}

	public function theme() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSTheme', 'theme_id', 'id');
	}
}
