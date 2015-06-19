<?php namespace AngkorCMS\Slideshow\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSSlideshowTransRequest extends Request {

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
			'lang_id' => 'required|exists:'.Config::get('angkorcmsslideshow.lang_table').','.Config::get('angkorcmsslideshow.lang_id'),
			'description' => 'required',
			'slideshow_id' => 'required|exists:angkorcms_slideshows,id',
		];
	}

}
