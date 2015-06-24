<?php namespace AngkorCMS\News\Repositories\Eloquent;

use AngkorCMS\News\AngkorCMSPost;
use AngkorCMS\News\AngkorCMSTag;
use AngkorCMS\News\Repositories\Contracts\AngkorCMSPostRepositoryInterface;
use Auth;
use Illuminate\Support\Str;
use Input;

class AngkorCMSPostRepository implements AngkorCMSPostRepositoryInterface {

	public function liste($n) {
		return $this->paginate($n);
	}

	public function paginate($n) {
		$posts = AngkorCMSPost::with('user', 'tags', 'comments', 'usersEdit')
			->orderBy('created_at', 'desc')
			->paginate($n);
		return compact('posts');
	}

	public function read($id) {
		$post = AngkorCMSPost::with('user', 'tags', 'usersEdit', 'comments')
			->find($id);
		return $post;
	}

	public function save() {
		$post = AngkorCMSPost::create(array(
			'user_id' => Auth::user()->id,
			'title' => Input::get('title'),
			'content' => Input::get('content'),
		));
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
		$post->usersEdit()->attach(Auth::user()->id, array('modification' => date('Y-m-d H:i:s')));
		$post->save();
		$post->tags()->detach();
		$this->addTag($post);
	}

	public function edit($id) {
		$post = AngkorCMSPost::with('user', 'tags')
			->find($id);
		return compact('post');
	}

	public function getPost($id) {
		$post = AngkorCMSPost::with('user', 'tags', 'comments', 'comments.user', 'usersEdit')
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