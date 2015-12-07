<?php namespace AngkorCMS\Slideshow\Http\Controllers;

use AngkorCMS\Slideshow\Http\Requests\AngkorCMSSlideRequest;
use AngkorCMS\Slideshow\Repositories\Eloquent\AngkorCMSSlideRepository;
use AngkorCMS\Slideshow\Repositories\Eloquent\AngkorCMSSlideshowRepository;
use Response;

class AngkorCMSSlideshowController extends AngkorCMSSlideshowBaseController {

	protected $slide_repository;
	protected $slideshow_repository;

	public function __construct(AngkorCMSSlideRepository $slide_repository, AngkorCMSSlideshowRepository $slideshow_repository) {
		parent::__construct();
		$this->slide_repository = $slide_repository;
		$this->slideshow_repository = $slideshow_repository;
		$this->middleware('angkorcmsajax', array('only' => array('postAddSlide', 'postDelSlide', 'postSaveOrder')));
	}

	public function postAddSlide(AngkorCMSSlideRequest $request) {
		$id = $this->slide_repository->store()->id;
		$slide = $this->slide_repository->getById($id);
		$data = array('slide' => $slide);
		return Response::json(array(
			'ok' => 1,
			'html' => view('angkorcms/slideshow/makerSlideRow', $data)->render(),
		));
	}

	public function postSaveOrder() {
		if ($this->slide_repository->reorder()) {
			return Response::json(array(
				'ok' => 1,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'An error occurred',
		));
	}

	public function postDelSlide($id_slide) {
		if ($this->slide_repository->destroy($id_slide)) {
			return Response::json(array(
				'ok' => 1,
				'idToDelete' => $id_slide,
			));
		}
		return Response::json(array(
			'ok' => 0,
			'error' => 'Slide doesn\'t exist',
		));
	}
}