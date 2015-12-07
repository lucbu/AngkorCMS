<?php namespace AngkorCMS\Medias\Http\Middleware;

use App;
use Closure;

class AngkorCMSAjax {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!$request->ajax()) {
			App::abort(404);
		}

		return $next($request);
	}

}
