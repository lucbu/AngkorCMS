<?php namespace AngkorCMS\Slideshow\Repositories\Eloquent;

use AngkorCMS\Slideshow\AngkorCMSSlideshow;
use AngkorCMS\Slideshow\Repositories\Contracts\AngkorCMSSlideshowRepositoryInterface;

class AngkorCMSSlideshowRepository implements AngkorCMSSlideshowRepositoryInterface {

	public function all() {
		$slideshows = AngkorCMSSlideshow::orderBy('id', 'DESC')
			->get();
		return compact('slideshows');
	}

	public function getByModule($id_module) {
		return AngkorCMSSlideshow::with('slides', 'slides.image')
			->where('module_id', $id_module)->first();
	}

	public function store($id_module) {
		$slideshow = AngkorCMSSlideshow::create(array(
			'module_id' => $id_module,
		));

		return $slideshow;
	}

	public function update($id) {
		$slideshow = AngkorCMSSlideshow::find($id);
		if ($slideshow == null) {
			return false;
		}
		$slideshow->save();
		return compact('slideshow');
	}

	public function destroy($id) {
		$slideshows = AngkorCMSSlideshow::find($id);
		if ($slideshow == null) {
			return false;
		}
		$slideshows->delete();
		return true;
	}
}