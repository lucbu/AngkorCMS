<?php namespace AngkorCMS\Users\Http\Requests;

use App\Http\Requests\Request;
use Route;

class UserUpdateRequest extends Request {

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
			'name' => 'required|max:30|alpha|unique:users,name,' . Route::getCurrentRoute()->getParameter('angkorcmsusers'),
			'email' => 'required|email|unique:users,email,' . Route::getCurrentRoute()->getParameter('angkorcmsusers'),
		];
	}

}
