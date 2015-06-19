<?php namespace AngkorCMS\Slideshow;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSSlide extends Model {

	protected $table = 'angkorcms_slides';

	public $timestamps = false;

	protected $fillable = ['title', 'description', 'url', 'position', 'slideshow_id', 'image_id'];

	public function image() {
		return $this->belongsTo('AngkorCMS\Medias\AngkorCMSImage', 'image_id', 'id');
	}

	public function slideshow() {
		return $this->belongsTo('AngkorCMS\Slideshow\AngkorCMSSlideshow', 'slideshow_id', 'id');
	}
}
