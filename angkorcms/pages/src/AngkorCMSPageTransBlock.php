<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSPageTransBlock extends Model {

	protected $table = 'angkorcms_pages_trans_blocks';

	protected $fillable = ['page_trans_id', 'block_id'];

	public $timestamps = false;

	public function pageTranslation() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSPageTrans', 'page_trans_id', 'id');
	}

	public function block() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSBlock', 'block_id', 'id');
	}

	public function modules() {
		return $this->hasMany('AngkorCMS\Pages\AngkorCMSPageTransBlockModule', 'page_trans_block_id', 'id')->orderBy('position');
	}
}