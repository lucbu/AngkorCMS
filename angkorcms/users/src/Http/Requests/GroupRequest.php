<?php namespace AngkorCMS\Users\Http\Requests;

use App\Http\Requests\Request;

class GroupRequest extends Request {

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
			'name' => 'required|max:30|alpha_dash|unique:angkorcms_groups,name,' . $this->segment(count($this->segments())),
			'group_parent_id' => 'exists:angkorcms_groups,id',
		];
	}

}
