<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSTemplateRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'name' => 'required|unique:angkorcms_templates,name',
		];
	}
}
