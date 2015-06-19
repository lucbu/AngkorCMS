<?php namespace AngkorCMS\Content;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSContent extends Model {

	protected $table = 'angkorcms_contents';

	public $timestamps = false;

	protected $fillable = ['content', 'module_id'];

	public function module() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSModule', 'module_id', 'id');
	}
}