<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSBlock extends Model {

	protected $table = 'angkorcms_blocks';

	protected $fillable = ['name', 'template_id'];

	public $timestamps = false;

	public function template() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSTemplate', 'template_id', 'id');
	}
}
