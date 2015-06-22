<?php namespace AngkorCMS\Pages\Facades;

use Config;

class AngkorCMSBladeBuilder {

	protected $nature_repository;
	protected $nature_view;
	protected $nature_unique;
	protected $nature_div;
	protected $moduleNumber;

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

	public function display($block, $parameters, $attributes = array(), $attributesToHtml = array()) {
		$this->moduleNumber = 0;
		$toShow = '';
		if ($block != null) {
			foreach ($block as $blockmodule) {
				$toShow .= $this->displayModule($blockmodule, $parameters, $attributes, $attributesToHtml);
			}
		}
		return $toShow;
	}

	public function displayModule($blockmodule, $parameters, $attributes = array(), $attributesToHtml = array()) {
		$module = $blockmodule->module;
		return $this->displayDryModule($blockmodule->id, $module, $parameters, $attributes, $attributesToHtml);
	}

	public function displayDryModule($unique_id, $module, $parameters, $attributes = array(), $attributesToHtml = array()) {
		if (!in_array($module->nature, $this->nature_unique)) {
			$modulePlugin = $this->nature_repository[$module->nature]->getByModule($module->id);
			if ($modulePlugin != null) {
				return $this->pluginView($module, $modulePlugin, $unique_id, $parameters, $attributes, $attributesToHtml);
			}
			return "\n";
		} else {
			return $this->pluginUniqueView($module, $unique_id, $parameters, $attributes, $attributesToHtml);
		}
	}

	public function pluginView($module, $modulePlugin, $unique_id, $parameters, $attributes, $attributesToHtml) {
		$data = array(
			"unique_id" => $unique_id,
			'module' => $module,
			$module->nature => $modulePlugin,
			'attr' => $attributesToHtml,
			'parameters' => $parameters,
			'attributes' => $attributes,
		);

		$html = $this->createView($attributes, $module, $data, $unique_id);

		return $html;
	}

	public function pluginUniqueView($module, $unique_id, $parameters, $attributes, $attributesToHtml) {
		$data = array(
			"unique_id" => $unique_id,
			'module' => $module,
			'attr' => $attributesToHtml,
			'parameters' => $parameters,
			'attributes' => $attributes,
		);

		$html = $this->createView($attributes, $module, $data, $unique_id);

		return $html;
	}

	public function createView($attributes, $module, $data, $unique_id) {

		$html = "\n";
		if ($module->title != '') {
			$html .= "<span id='" . $module->title . "'>\n";
		}

		if (count($attributes) > 0 && $this->nature_div[$module->nature]) {
			$this->moduleNumber++;
			foreach ($attributes as $attr) {
				if (is_array($attr)) {
					$stringAttr = $this->attributesFromArray($attr);
					$tag = "div";
					if (isset($attr["type"])) {
						$tag = $attr["type"];
					}
					$html .= "<" . $tag . " " . $stringAttr . ">\n";
				}
			}
		}
		$html .= "<span id='blockmodule" . $unique_id . "'>\n";
		$html .= view($this->nature_view[$module->nature], $data)->render() . "\n";
		$html .= "</span>\n";
		if (count($attributes) > 0 && $this->nature_div[$module->nature]) {
			foreach (array_reverse($attributes) as $attr) {
				if (is_array($attr)) {
					$tag = "div";
					if (isset($attr["type"])) {
						$tag = $attr["type"];
					}
					$html .= "</" . $tag . ">\n";
				}
			}
		}
		if ($module->title != '') {
			$html .= "</span>\n";
		}

		return $html;
	}

	protected function attributesFromArray($attributes) {
		$stringAttr = '';
		foreach ($attributes as $key => $value) {
			if ($key != "type") {
				$theValue = $value;
				if (is_array($value)) {
					$nbValue = count($value);
					if(isset($value["stop"])){$nbValue--;}
					if (isset($value["stop"]) && $value["stop"] == true && $this->moduleNumber > $nbValue) {
						$theValue = $value[$nbValue - 1];
					} else {
						$theValue = $value[($this->moduleNumber - 1) % $nbValue];
					}
				}
				$stringAttr .= $key . "='" . $theValue . "' ";
			}
		}
		return $stringAttr;
	}

}