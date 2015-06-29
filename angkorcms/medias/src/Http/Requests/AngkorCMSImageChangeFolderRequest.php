<?php namespace AngkorCMS\Medias\Http\Requests;

use App\Http\Requests\Request;

class AngkorCMSImageChangeFolderRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'image_id' => 'numeric|exists:angkorcms_images,id',
			'folder_id' => 'numeric|exists:angkorcms_folders,id',
		];
	}

}
