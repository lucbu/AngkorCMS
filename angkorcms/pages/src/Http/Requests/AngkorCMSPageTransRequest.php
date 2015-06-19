<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;
use Input;

class AngkorCMSPageTransRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'title' => 'required',
			'slug' => 'required|unique:angkorcms_pages_trans,slug',
			'page_id' => 'required|exists:angkorcms_pages,id',
			'lang_id' => 'required|exists:angkorcms_langs,id|unique:angkorcms_pages_trans,lang_id,NULL,id,page_id,' . Input::get('page_id'),
		];
	}
}
