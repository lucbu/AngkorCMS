<?php namespace AngkorCMS\MultiLanguages\Http\Requests;

use App\Http\Requests\Request;
use Config;
class AngkorCMSLangRequest extends Request {

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
			'code' => 'required|max:2',
			'description' => 'required',
			'image_id' => 'exists:'.Config::get('angkorcmsmultilanguages.image_table').','.Config::get('angkorcmsmultilanguages.image_id'),
		];
	}

}
