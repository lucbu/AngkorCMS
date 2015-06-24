<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSTemplate;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSTemplateRepositoryInterface;
use File;
use Input;

class AngkorCMSTemplateRepository implements AngkorCMSTemplateRepositoryInterface {

	public function all() {
		$templates = AngkorCMSTemplate::with('themes')->orderBy('id', 'DESC')
		                                              ->get();
		return $templates;
	}

	public function getById($id) {
		$template = AngkorCMSTemplate::with('themes', 'blocks')->find($id);
		return $template;
	}

	public function store() {
		$template = AngkorCMSTemplate::create(array(
			'name' => Input::get('name'),
		));

		return $template;
	}

	public function update($id) {
		$template = AngkorCMSTemplate::find($id);
		if ($template == null) {
			return false;
		}
		$template->name = Input::get('name');
		$template->save();
		return $template;
	}

	public function destroy($id) {
		$template = AngkorCMSTemplate::find($id);
		if ($template == null) {
			return false;
		}
		$pathCss = "css\\" . $template->name;
		$pathJs = "js\\" . $template->name;
		$pathView = "..\\resources\\views\\templates\\" . $template->name;
		File::deleteDirectory($pathCss);
		File::deleteDirectory($pathJs);
		File::deleteDirectory($pathView);

		$template->delete();
		return true;
	}
}