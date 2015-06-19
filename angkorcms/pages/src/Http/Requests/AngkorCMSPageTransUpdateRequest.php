<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;
use Input;

class AngkorCMSPageTransUpdateRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'title' => 'required',
			'slug' => 'required|unique:angkorcms_pages_trans,slug,NULL,id,id,' . Input::get('page_trans'),
		];
	}
}
