<?php namespace AngkorCMS\Pages\Repositories\Eloquent;

use AngkorCMS\Pages\AngkorCMSTheme;
use AngkorCMS\Pages\Repositories\Contracts\AngkorCMSThemeRepositoryInterface;
use Input;

class AngkorCMSThemeRepository implements AngkorCMSThemeRepositoryInterface {

	public function all() {
		$themes = AngkorCMSTheme::orderBy('id', 'DESC')
			->get();
		return $themes;
	}

	public function getById($id) {
		$theme = AngkorCMSTheme::with('template', 'template.blocks')->find($id);
		return $theme;
	}

	public function getByTemplate($template_id) {
		$themes = AngkorCMSTheme::orderBy('id', 'DESC')
			->where('template_id', $template_id)
			->get();
		return $themes;
	}

	public function store($template_name) {

		$name = Input::get('name');

		$style = Input::file('style');
		$view = Input::file('view');
		$script = Input::file('script');

		$pathCss = "css\\" . $template_name . "\\" . $name . "\\";
		$pathJs = "js\\" . $template_name . "\\" . $name . "\\";
		$pathView = "..\\resources\\views\\templates\\" . $template_name . "\\" . $name . "\\";

		$styleExtension = $style->getClientOriginalExtension();
		$viewExtension = $view->getClientOriginalExtension();
		$scriptExtension = $script->getClientOriginalExtension();

		if ($viewExtension != "php" || $styleExtension != "css" || $scriptExtension != "js") {
			return false;
		}

		$styleName = $style->getClientOriginalName();
		$viewName = $view->getClientOriginalName();
		$scriptName = $script->getClientOriginalName();

		$style->move($pathCss, $styleName);
		$view->move($pathView, $viewName);
		$script->move($pathJs, $scriptName);

		$theme = AngkorCMSTheme::create(array(
			'name' => $name,
			'style' => $styleName,
			'view' => $viewName,
			'script' => $scriptName,
			'template_id' => Input::get('template_id'),
		));

		return $theme;
	}

	public function update($id) {

		$theme = AngkorCMSTheme::with('template')->find($id);
		if ($theme == null) {
			return false;
		}

		$template_name = $theme->template->name;
		$name = $theme->name;
		$pathCss = "css\\" . $template_name . "\\" . $name . "\\";
		$pathJs = "js\\" . $template_name . "\\" . $name . "\\";
		$pathView = "..\\resources\\views\\templates\\" . $template_name . "\\" . $name . "\\";

		$style = Input::get('style');
		$view = Input::get('view');
		$script = Input::get('script');

		// Style
		$styleFile = fopen($pathCss . '\\' . $theme->style, 'r+');
		ftruncate($styleFile, 0);
		fputs($styleFile, $style);
		fclose($styleFile);
		// View
		$viewFile = fopen($pathView . '\\' . $theme->view, 'r+');
		ftruncate($viewFile, 0);
		fputs($viewFile, $view);
		fclose($viewFile);
		// Script
		$scriptFile = fopen($pathJs . '\\' . $theme->script, 'r+');
		ftruncate($scriptFile, 0);
		fputs($scriptFile, $script);
		fclose($scriptFile);

		$theme->name = Input::get('name');
		$theme->save();
		return $theme;
	}

	public function destroy($id) {
		$theme = AngkorCMSTheme::find($id);
		if ($theme == null) {
			return false;
		}
		$theme->delete();
		return true;
	}
}