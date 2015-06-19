<?php namespace AngkorCMS\Pages;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSTheme extends Model {

	protected $table = 'angkorcms_themes';

	protected $fillable = ['name', 'style', 'view', 'script', 'template_id'];

	public $timestamps = false;

	public function template() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSTemplate', 'template_id', 'id');
	}
}
