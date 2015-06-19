<?php namespace AngkorCMS\Slideshow\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSSlideshowRequest extends Request {

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
			'name' => 'required',
			'slideshow_trans_id' => 'required|exists:angkorcms_slideshows_trans,id',
		];
	}

}
