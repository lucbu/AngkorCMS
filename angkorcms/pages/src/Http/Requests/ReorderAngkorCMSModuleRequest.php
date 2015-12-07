<?php namespace AngkorCMS\Pages\Http\Requests;

use App\Http\Requests\Request;

class ReorderAngkorCMSModuleRequest extends Request {

	public function authorize() {
		return true;
	}

	public function rules() {
		return [
			'block_id' => 'required|exists:angkorcms_pages_trans_blocks,id',
		];
	}
}
