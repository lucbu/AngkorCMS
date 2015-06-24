<?php namespace AngkorCMS\News;

use Illuminate\Database\Eloquent\Model;

class AngkorCMSPost extends Model {
	
	protected $table = "angkorcms_posts";

    protected $fillable = array('title', 'content', 'user_id');

    public $timestamps = true;

    public function user() 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function tags()
	{
		return $this->belongsToMany('AngkorCMS\News\AngkorCMSTag', 'angkorcms_post_tag', 'post_id', 'tag_id');
	}

    public function getCommentsPaginatedAttribute()
    {
        //this function allow the use of $post->comments_paginated in blade
        return $this->comments()->paginate(10);
    }

    public function comments() 
    {
        return $this->hasMany('AngkorCMS\News\AngkorCMSComment', 'post_id', 'id');
    }

    public function usersEdit()
    {
        return $this->belongsToMany('App\User', 'angkorcms_editpost_user', 'post_id', 'user_id')
        ->withPivot('modification')->orderBy('modification');
    } 

}