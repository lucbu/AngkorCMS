<?php namespace AngkorCMS\News;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSComment extends Model {

	protected $table = "angkorcms_comments";

	protected $fillable = array('content', 'user_id', 'post_id');

	public $timestamps = true;

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function post() {
		return $this->belongsTo('AngkorCMS\News\AngkorCMSPost');
	}

}