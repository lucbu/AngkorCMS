<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSModuleRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'name' => 'required',
			'title' => '',
			'lang_id' => 'required|exists:angkorcms_langs,id',
		];
	}
}
