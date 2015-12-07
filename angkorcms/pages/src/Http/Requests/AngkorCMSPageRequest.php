<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSPageRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'name' => 'required|unique:angkorcms_pages,name,' . $this->segment(count($this->segments())),
			'theme_id' => 'required|exists:angkorcms_themes,id',
		];
	}
}
