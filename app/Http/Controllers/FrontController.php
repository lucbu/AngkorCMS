<?php namespace App\Http\Controllers;

use AngkorCMS\Pages\Repositories\Eloquent\AngkorCMSPageTransRepository;
use App;
use App\Http\Controllers\Controller;
use Config;
use Redirect;
use Session;
use URL;

class FrontController extends Controller {

	protected $page_trans_repository;

	public function __construct(AngkorCMSPageTransRepository $page_trans_repository) {
		$this->page_trans_repository = $page_trans_repository;
	}

	public function index($slug) {
		return $this->indexGeneral($slug);
	}

	public function indexWithParameters($slug, $parameters) {
        //get parameters array form string
		if ($parameters) {
			$parameters = explode('/', $parameters);
			$nbParams = count($parameters);
			$newParam = array();
			if ($nbParams > 1) {
				for ($i = 0; $i < intval($nbParams / 2); $i++) {
					$newParam[$parameters[$i * 2]] = $parameters[($i * 2) + 1];
				}
				$parameters = $newParam;
			}
		}
		return $this->indexGeneral($slug, $parameters);
	}

	public function indexGeneral($slug, $parameters = array()) {
        //Get the slug
		$page_trans = $this->page_trans_repository->getBySlug($slug);

		$nextPath = '';
		if ($page_trans == null) {
			if (count($parameters) > 0) {
                // Redirect to the right index if no page found and parameters used
				if (isset($parameters[0])) {
					$parameters[$slug] = $parameters[0];
					unset($parameters[0]);
				}
				$nextPath = '';
				foreach ($parameters as $key => $value) {
					$nextPath .= '/' . $key . '/' . $value;
				}
				Session::reflash();

				$newUrl = Session::get('language')->code . '/' . Config::get('angkorcmspages.alias.' . Session::get('language')->code . '.index') . $nextPath;
				return Redirect::to($newUrl);
			} else {
				App::abort(404);
			}
		}

        // If page not accessible
		if (!$page_trans->page->accessible) {
			App::abort(404);
		}

		// Page translation checking.
		if ($page_trans->lang_id != Session::get('language')->id) {
			$page = $page_trans->page;
            // Get the right URL that match with language
			$newSlug = $this->page_trans_repository->getSlugByPageLang($page->id, Session::get('language')->id);
			if ($newSlug != null) {
				$nextPath = '';
				foreach ($parameters as $key => $value) {
					$nextPath = '/' . $key . '/' . $value;
				}
				Session::reflash();
				return Redirect::to(Session::get('language')->code . '/' . $newSlug->slug . $nextPath);
			}
		}


		foreach ($parameters as $key => $value) {
			$nextPath .= '/' . $key . '/' . $value;
		}

        //GET PARAMETERS
		$url_base = URL::to($slug);
		$parameters['slug'] = $slug;
		$parameters['url_base'] = $url_base;
		$parameters['parameters'] = $nextPath;
		$parameters['end_url'] = $slug . $nextPath;

        // GET THEME/TEMPLATE
		$theme = $page_trans->page->theme;
		$template = $theme->template;

        // GET BLOCKs
		$listBlocks = $page_trans->blocks;
		$blocks = array();
		foreach ($template->blocks as $value) {
			$blocks[$value->name] = array();
		}
		foreach ($listBlocks as $block) {
			$blocks[$block->block->name] = $block->modules;
		}

        // Set datas
		$data = array('title' => $page_trans->title, 'blocks' => $blocks, 'parameters' => $parameters);

        // GET VIEW
		$view = "templates/" . $template->name . "/" . $theme->name . "/" . $theme->view;
		$view = str_replace(".blade.php", "", $view);

        // return view with data
        return view($view, $data);
	}

	/*public function test() {
		return var_dump(Session::get('data'));
	}*/

	public function byDefault() {
		return Redirect::to(Config::get("angkorcmspages.alias." . Session::get('language')->code . ".index"));
	}
}
