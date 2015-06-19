<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;
use Input;

class AngkorCMSBlockRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'template_id' => 'required|exists:angkorcms_templates,id',
			'name' => 'required|unique:angkorcms_blocks,name,NULL,id,template_id,' . Input::get('template_id'),
		];
	}
}
