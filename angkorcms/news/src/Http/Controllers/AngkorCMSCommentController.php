<?php namespace AngkorCMS\News\Http\Controllers;

use AngkorCMS\News\Http\Requests\AngkorCMSCommentRequest;
use AngkorCMS\News\Repositories\Eloquent\AngkorCMSCommentRepository;
use Illuminate\Support\Facades\Redirect;

class AngkorCMSCommentController extends AngkorCMSNewsBaseController {
	protected $comment_repository;

	public function __construct(AngkorCMSCommentRepository $comment_repository) {
		parent::__construct();
		$this->comment_repository = $comment_repository;
	}

	public function postComment($id, AngkorCMSCommentRequest $request) {
		$this->comment_repository->save($id);
		return Redirect::back();
	}

	public function deleteComment($id) {
		$comment = $this->comment_repository->read($id);
		if ($this->comment_repository->del($id)) {
			return Redirect::back()
				->with('info', 'The comment has been deleted.');
		}
		return Redirect::back();
	}
}