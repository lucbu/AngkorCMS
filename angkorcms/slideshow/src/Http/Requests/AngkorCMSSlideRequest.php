<?php namespace AngkorCMS\Slideshow\Http\Requests;

use App\Http\Requests\Request;
use Config;

class AngkorCMSSlideRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'title' => '',
			'description' => '',
			'url' => 'url',
			'slideshow_id' => 'required|exists:angkorcms_slideshows,id',
			'image_id' => 'required|exists:' . Config::get('angkorcmsslideshows.image_table') . ',' . Config::get('angkorcmsslideshows.image_id'),
		];
	}

}
