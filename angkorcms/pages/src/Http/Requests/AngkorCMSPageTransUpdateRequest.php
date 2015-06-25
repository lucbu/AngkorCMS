<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSPageTransUpdateRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'title' => 'required',
			'slug' => 'required|unique:angkorcms_pages_trans,slug,' . $this->segment(count($this->segments())),
		];
	}
}
