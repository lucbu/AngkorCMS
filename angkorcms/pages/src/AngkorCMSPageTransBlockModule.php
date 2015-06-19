<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSPageTransBlockModule extends Model {

	protected $table = 'angkorcms_pages_trans_blocks_modules';

	protected $fillable = ['position', 'page_trans_block_id', 'module_id'];

	public $timestamps = false;

	public function PageTransBlock() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSPageTransBlock', 'page_trans_block_id', 'id');
	}
	
	public function module() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSModule', 'module_id', 'id');
	}
}