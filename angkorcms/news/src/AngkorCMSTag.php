<?php namespace AngkorCMS\News;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSTag extends Model {

    protected $table = 'angkorcms_tags';
	public $timestamps = true;
	protected $fillable = array('tag','tag_url');

	public function posts()
	{
		return $this->belongsToMany('AngkorCMS\News\AngkorCMSPost', 'angkorcms_post_tag', 'tag_id', 'post_id');
	}

}