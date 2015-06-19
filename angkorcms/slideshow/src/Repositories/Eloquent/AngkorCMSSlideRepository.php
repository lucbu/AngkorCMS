<?php namespace AngkorCMS\Slideshow\Repositories\Eloquent;

use AngkorCMS\Slideshow\AngkorCMSSlide;
use AngkorCMS\Slideshow\Repositories\Contracts\AngkorCMSSlideRepositoryInterface;
use Input;

class AngkorCMSSlideRepository implements AngkorCMSSlideRepositoryInterface {

	public function all() {
		$slides = AngkorCMSSlide::with('image')
			->orderBy('id', 'DESC')
			->get();
		return $slides;
	}

	public function getById($id) {
		return AngkorCMSSlide::with('image')->find($id);
	}

	public function store() {
		$image_id = null;
		if (Input::get('image_id') != null) {
			$image_id = Input::get('image_id');
		}
		$slide = AngkorCMSSlide::create(array(
			'title' => Input::get('title'),
			'description' => Input::get('description'),
			'url' => Input::get('url'),
			'image_id' => $image_id,
			'slideshow_id' => Input::get('slideshow_id'),
		));

		return $slide;
	}

	public function reorder() {
		$slideshow_id = Input::get('slideshow_id');
		$orders = Input::get('order');
		$listSlide = array();
		foreach ($orders as $value) {
			$slide = $this->getById($value);
			if ($slide == null || $slide->slideshow_id != $slideshow_id) {
				return false;
			}
			$listSlide[] = $slide;
		}
		$i = 0;
		foreach ($listSlide as $slide) {
			$slide->position = $i;
			$slide->save();
			$i++;
		}
		return true;
	}

	public function destroy($id) {
		$slide = AngkorCMSSlide::find($id);
		if ($slide == null) {
			return false;
		}
		$slide->delete();
		return true;
	}
}