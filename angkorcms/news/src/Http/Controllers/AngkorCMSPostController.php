<?php namespace AngkorCMS\News\Http\Controllers;

use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSFolderRepository;
use AngkorCMS\Medias\Repositories\Eloquent\AngkorCMSImageRepository;
use AngkorCMS\MultiLanguages\Repositories\Eloquent\AngkorCMSLangRepository;
use AngkorCMS\News\Http\Requests\AngkorCMSPostRequest;
use AngkorCMS\News\Http\Requests\AngkorCMSPostUpdateRequest;
use AngkorCMS\News\Repositories\Eloquent\AngkorCMSCommentRepository;
use AngkorCMS\News\Repositories\Eloquent\AngkorCMSPostRepository;
use Illuminate\Support\Facades\Redirect;

class AngkorCMSPostController extends AngkorCMSNewsBaseController {
	protected $post_repository;

	public function __construct(AngkorCMSPostRepository $post_repository) {
		parent::__construct();
		$this->post_repository = $post_repository;
	}

	public function index() {
		return view('angkorcms/news/list', $this->post_repository->liste(5));
	}

	public function show($id, AngkorCMSCommentRepository $comment_gestion) {
		$data = array(
			'post' => $this->post_repository->read($id),
			'comments' => $comment_gestion->paginate($id, 10),
		);
		return view('angkorcms/news/read')->with($data);
	}

	public function create(AngkorCMSFolderRepository $folderrepository, AngkorCMSImageRepository $imagerepository, AngkorCMSLangRepository $lang_repository) {
		$folders = $folderrepository->getFullFolders();
		$imagesroot = $imagerepository->getListByFolder();
		$langs = $lang_repository->allLangsShort();

		$data = array_merge($folders, $imagesroot, compact('langs'));

		return view('angkorcms/news/add', $data);
	}

	public function store(AngkorCMSPostRequest $request) {
		$id = $this->post_repository->save();
		return Redirect::route('angkorcmsnews.show', [$id]);
	}

	public function edit($id, AngkorCMSFolderRepository $folderrepository, AngkorCMSImageRepository $imagerepository, AngkorCMSLangRepository $lang_repository) {
		$folders = $folderrepository->getFullFolders();
		$imagesroot = $imagerepository->getListByFolder();
		$langs = $lang_repository->allLangsShort();

		$post = $this->post_repository->getPost($id);

		$data = array_merge(compact('post'), $folders, $imagesroot, compact('langs'));

		return view('angkorcms/news/edit', $data);
	}

	public function update($id, AngkorCMSPostUpdateRequest $request) {
		$post = $this->post_repository->getPost($id);
		$this->post_repository->update($id);
		return Redirect::route('angkorcmsnews.show', [$id])
			->with('info', 'The post has been modified.');
	}

	public function destroy($id) {
		$this->post_repository->del($id);
		return Redirect::route('angkorcmsnews.index')
			->with('info', 'The post has been deleted.');
	}

	public function getTag($tag) {
		$posts = $this->post_repository->tag($tag, 10);
		return view('angkorcms/news/list', $posts)
			->with('ok', 'Results for the tag : ' . $tag);
	}
}
