<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSGroupModuleRequest extends Request {

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
			'module_id' => 'required|exists:angkorcms_modules,id',
			'groupmodule_id' => 'required|exists:angkorcms_groupsmodules,id',
		];
	}

}
