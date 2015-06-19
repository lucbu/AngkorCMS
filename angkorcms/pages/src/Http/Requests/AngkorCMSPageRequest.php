<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;
use Input;

class AngkorCMSPageRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'name' => 'required|unique:angkorcms_pages,name,NULL,id,id,' . Input::get('page'),
			'theme_id' => 'required|exists:angkorcms_themes,id',
		];
	}
}
