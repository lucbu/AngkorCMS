<?php namespace AngkorCMS\News\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class AngkorCMSPostRequest extends Request {
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
			'title' => 'required|max:80',
			'content' => 'required',
			'tags' => 'tags',
			'lang_id' => 'required|exists:angkorcms_langs,id',
		];
	}

	public function messages() {
		return [
			'tags.tags' => 'Each tag must not exceed 50 characters.',
		];
	}

}
