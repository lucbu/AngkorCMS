<?php namespace AngkorCMS\MultiLanguages\Http\Middleware;

use AngkorCMS\MultiLanguages\Repositories\Eloquent\AngkorCMSLangRepository;
use Closure;
use Config;
use Redirect;
use Request;
use Route;
use Session;

class AngkorCMSLanguage {

	protected $lang_repository;

	public function __construct(AngkorCMSLangRepository $lang_repository) {
		$this->lang_repository = $lang_repository;
	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!Session::has('language') or !Session::has('locale')) {
			$lang = $this->lang_repository->getByCode(Config::get('angkorcmsmultilanguages.default_language'));
			Session::put('language', $lang);
			Session::put('locale', Session::get('language')->code);
		}

		$locale = Request::segment(1);

		if (Session::has('newLang')) {
			$lang = $this->lang_repository->getByCode(Session::get('newLang')->code);
			Session::put('language', $lang);
			Session::put('locale', Session::get('language')->code);
			$locale = Session::get('language')->code;
		}
		$languages = $this->lang_repository->allCode();

		$path = '';
		$path = Route::current()->getPath();

		foreach (Route::current()->parametersWithoutNulls() as $key => $value) {
			$path = str_replace('{' . $key . '}', $value, $path);
		}

		if (isset($locale) && in_array($locale, $languages)) {
			if (Session::get('language')->code != $locale) {
				Session::put('language', $this->lang_repository->getByCode($locale));
				Session::put('locale', Session::get('language')->code);
			}
		} else {
			Session::reflash();
			return Redirect::to(Session::get('language')->code . '/' . $path);
		}
		app()->setLocale(Session::get('language')->code);

		return $next($request);
	}

}
