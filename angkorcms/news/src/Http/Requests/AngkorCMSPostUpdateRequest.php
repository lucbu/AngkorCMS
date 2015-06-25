<?php namespace AngkorCMS\News\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class AngkorCMSPostUpdateRequest extends Request {
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
			'slug' => 'required|alpha_dash|unique:angkorcms_posts,slug,' . $this->segment(count($this->segments())),
			'tags' => 'tags',
		];
	}

	public function messages() {
		return [
			'tags.tags' => 'Each tag must not exceed 50 characters.',
		];
	}

}
