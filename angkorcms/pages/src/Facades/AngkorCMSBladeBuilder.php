<?php namespace AngkorCMS\Pages\Facades;

use Config;

class AngkorCMSBladeBuilder {

	protected $nature_repository;
	protected $nature_view;
	protected $nature_unique;
	protected $nature_div;

	public function __construct() {
		foreach (Config::get('angkorcmsmodules.natures') as $key => $value) {

			if (!Config::has($value . '.unique') || !Config::get($value . '.unique')) {
				$configRepository = $value . '.repository';
				$repo = Config::get($configRepository);
				$this->nature_repository[$key] = new $repo;
			} else {
				$this->nature_unique[] = $key;
			}
			$configView = $value . '.showView';
			$view = Config::get($configView);
			$this->nature_view[$key] = $view;

			$configDiv = $value . '.showDiv';
			$div = true;
			if (Config::has($configDiv)) {
				$div = Config::get($configDiv);
			}
			$this->nature_div[$key] = $div;
		}

	}

	public function display($block, $parameters, $div = true, $attributes = array(), $attributesToHtml = array()) {
		$toShow = '';
		if ($block != null) {
			foreach ($block as $blockmodule) {
				$toShow .= $this->displayModule($blockmodule, $parameters, $div, $attributes, $attributesToHtml);
			}
		}
		return $toShow;
	}

	public function displayModule($blockmodule, $parameters, $div = true, $attributes = array(), $attributesToHtml = array()) {
		$module = $blockmodule->module;
		return $this->displayDryModule($blockmodule->id, $module, $parameters, $div, $attributes, $attributesToHtml);
	}

	public function displayDryModule($unique_id, $module, $parameters, $div = true, $attributes = array(), $attributesToHtml = array()) {
		if (!in_array($module->nature, $this->nature_unique)) {
			$modulePlugin = $this->nature_repository[$module->nature]->getByModule($module->id);
			if ($modulePlugin != null) {
				return $this->pluginView($module, $modulePlugin, $unique_id, $parameters, $div, $attributes, $attributesToHtml);
			}
			return "\n";
		} else {
			return $this->pluginUniqueView($module, $unique_id, $parameters, $div, $attributes, $attributesToHtml);
		}
	}

	public function pluginView($module, $modulePlugin, $unique_id, $parameters, $div, $attributes, $attributesToHtml) {
		$data = array(
			"unique_id" => $unique_id,
			'module' => $module,
			$module->nature => $modulePlugin,
			'attr' => $attributesToHtml,
			'parameters' => $parameters,
			'attributes' => $attributes,
			'div' => $div,
		);

		$html = $this->createView($attributes, $div, $module, $data, $unique_id);

		return $html;
	}

	public function pluginUniqueView($module, $unique_id, $parameters, $div, $attributes, $attributesToHtml) {
		$data = array(
			"unique_id" => $unique_id,
			'module' => $module,
			'attr' => $attributesToHtml,
			'parameters' => $parameters,
			'attributes' => $attributes,
			'div' => $div,
		);

		$html = $this->createView($attributes, $div, $module, $data, $unique_id);

		return $html;
	}

	public function createView($attributes, $div, $module, $data, $unique_id) {
		$stringAttr = $this->attributesFromArray($attributes);

		$html = "\n";
		if ($div && $this->nature_div[$module->nature]) {
			$html .= "<div id='blockmodule" . $unique_id . "' " . $stringAttr . ">\n";
		}
		$html .= view($this->nature_view[$module->nature], $data)->render() . "\n";
		if ($div && $this->nature_div[$module->nature]) {
			$html .= "</div>\n";
		}

		return $html;
	}

	protected function attributesFromArray($attributes) {
		$stringAttr = '';
		foreach ($attributes as $key => $value) {
			$stringAttr .= $key . "='" . $value . "' ";
		}
		return $stringAttr;
	}

}