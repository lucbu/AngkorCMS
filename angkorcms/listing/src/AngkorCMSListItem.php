<?php namespace AngkorCMS\Listing;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSListItem extends Model {

	protected $table = 'angkorcms_list_items';

	public $timestamps = false;

	protected $fillable = ['text', 'url', 'anchor', 'position', 'list_id'];

	public function listing() {
		return $this->belongsTo('AngkorCMS\Listing\AngkorCMSList', 'list_id', 'id');
	}
}
