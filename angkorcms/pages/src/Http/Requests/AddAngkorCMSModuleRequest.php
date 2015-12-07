<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;

class AddAngkorCMSModuleRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'page_trans_id' => 'required|exists:angkorcms_pages_trans,id',
			'module_id' => 'required|exists:angkorcms_modules,id',
			'block_id' => 'required|exists:angkorcms_blocks,id',
		];
	}
}
