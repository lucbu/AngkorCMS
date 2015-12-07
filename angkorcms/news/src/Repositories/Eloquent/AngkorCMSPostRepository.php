<?php namespace AngkorCMS\News\Repositories\Eloquent;

use AngkorCMS\News\AngkorCMSPost;
use AngkorCMS\News\AngkorCMSTag;
use AngkorCMS\News\Repositories\Contracts\AngkorCMSPostRepositoryInterface;
use Auth;
use Illuminate\Support\Str;
use Input;
use Session;

class AngkorCMSPostRepository implements AngkorCMSPostRepositoryInterface {

	public function liste($n) {
		return $this->paginate($n);
	}

	public function listeByLang($n, $lang_id = null) {
		if ($lang_id == null) {
			$lang_id = Session::get('language')->id;
		}
		return $this->paginateByLang($n, $lang_id);
	}

	public function paginate($n) {
		$posts = AngkorCMSPost::with('user', 'tags', 'comments', 'usersEdit', 'lang', 'lang.image')
			->orderBy('created_at', 'desc')
			->paginate($n);
		return compact('posts');
	}

	public function paginateByLang($n, $lang_id = null) {
		if ($lang_id == null) {
			$lang_id = Session::get('language')->id;
		}
		$posts = AngkorCMSPost::with('user', 'tags', 'comments', 'usersEdit', 'lang', 'lang.image')
			->orderBy('created_at', 'desc')
			->where('lang_id', $lang_id)
			->paginate($n);
		return compact('posts');
	}

	public function read($id) {
		$post = AngkorCMSPost::with('user', 'tags', 'usersEdit', 'comments', 'lang', 'lang.image')
			->find($id);
		return $post;
	}

	public function getBySlug($slug) {
		$post = AngkorCMSPost::with('user', 'tags', 'usersEdit', 'comments', 'lang', 'lang.image')
			->where('slug', $slug)->first();
		return $post;
	}

	public function save() {
		$post = AngkorCMSPost::create(array(
			'user_id' => Auth::user()->id,
			'title' => Input::get('title'),
			'lang_id' => Input::get('lang_id'),
			'slug' => '',
			'content' => Input::get('content'),
		));
		$slug = $post->id . "-" . Str::slug($post->title);
		$post->slug = $slug;
		$post->save();
		$this->addTag($post);
		return $post->id;
	}

	public function addTag($post) {
		if (Input::has('tags')) {
			$post = AngkorCMSPost::find($post->id);
			$tags = explode(',', Input::get('tags'));
			foreach ($tags as $tag) {
				$tag = trim($tag);
				if ($tag != "") {
					$tag_url = Str::slug($tag);
					$tag_ref = AngkorCMSTag::where('tag_url', $tag_url)->first();
					if (is_null($tag_ref)) {
						$tag_ref = new AngkorCMSTag(array(
							'tag' => $tag,
							'tag_url' => $tag_url,
						));
						$post->tags()->save($tag_ref);
					} else {
						$post->tags()->attach($tag_ref->id);
					}
				}
			}
		}
	}

	public function update($id) {
		$post = AngkorCMSPost::find($id);
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->lang_id = Input::get('lang_id');
		$post->slug = Input::get('slug');
		$post->usersEdit()->attach(Auth::user()->id, array('modification' => date('Y-m-d H:i:s')));
		$post->save();
		$post->tags()->detach();
		$this->addTag($post);
	}

	public function edit($id) {
		$post = AngkorCMSPost::with('user', 'tags', 'lang', 'lang.image')
			->find($id);
		return compact('post');
	}

	public function getPost($id) {
		$post = AngkorCMSPost::with('user', 'tags', 'comments', 'comments.user', 'usersEdit', 'lang', 'lang.image')
			->find($id);
		return $post;
	}

	public function del($id) {
		if (!is_null($post = AngkorCMSPost::find($id))) {
			$post->tags()->detach();
			$post->delete();
		}
	}

	public function tag($tag, $n) {
		$posts = AngkorCMSPost::with('user', 'tags')
			->orderBy('created_at', 'desc')
			->whereHas('tags', function ($q) use ($tag) {
				$q->where('angkorcms_tags.tag_url', $tag);
			})->paginate($n);
		return compact('posts');
	}

}