<?php namespace AngkorCMS\News\Repositories\Eloquent;

use AngkorCMS\News\AngkorCMSComment;
use Input;
use Auth;
use Illuminate\Support\Str;

class AngkorCMSCommentRepository{

	public function paginate($id, $n){
		$comments = AngkorCMSComment::with('user')
		->where('post_id', '=', $id)
		->paginate($n);
		return $comments;
	}

	public function read($id)
	{
		$comment = AngkorCMSComment::with('user')
		->where('post_id', '=', $id);
		return compact('comment');
	}

	public function save($id)
	{
		$comment = AngkorCMSComment::create(array(
			'content' => Input::get('content'),
			'user_id' => Auth::user()->id,
			'post_id' => $id
		));
	}

	public function del($id){
		if(!is_null($comment = AngkorCMSComment::find($id))) {
			if(Auth::user()->id === $comment->user->id || Auth::user()->admin){
				$comment->delete();
				return true;
			}
			return false;
		}
	}

}