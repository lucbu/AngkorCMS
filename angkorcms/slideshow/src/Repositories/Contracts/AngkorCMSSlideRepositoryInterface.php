<?php namespace AngkorCMS\Slideshow\Repositories\Contracts;

interface AngkorCMSSlideRepositoryInterface {

	public function all();
	public function store();
	public function destroy($id);

}