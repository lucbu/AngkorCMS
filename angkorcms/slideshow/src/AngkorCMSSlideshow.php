<?php namespace AngkorCMS\Slideshow;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSSlideshow extends Model {

	protected $table = 'angkorcms_slideshows';

	public $timestamps = false;

	protected $fillable = ['module_id'];

	public function module() {
		return $this->belongsTo('AngkorCMS\Pages\AngkorCMSModule', 'module_id', 'id');
	}

	public function slides() {
		return $this->hasMany('AngkorCMS\Slideshow\AngkorCMSSlide', 'slideshow_id', 'id')->orderBy('position');
	}
}