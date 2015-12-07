<?php namespace AngkorCMS\Maps\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSMapRequest extends Request {

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
			'lat' => 'required|numeric',
			'lng' => 'required|numeric',
			'latMarker' => 'required|numeric',
			'lngMarker' => 'required|numeric',
			'zoom' => 'required|numeric',
		];
	}

}
