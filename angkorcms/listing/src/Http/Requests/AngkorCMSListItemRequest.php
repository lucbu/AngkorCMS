<?php namespace AngkorCMS\Listing\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSListItemRequest extends Request {

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
			'text' => 'required',
			'url' => '',
			'list_id' => 'required|exists:angkorcms_lists,id',
		];
	}

}
