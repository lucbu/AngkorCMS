<?php namespace App\Http\Middleware;

use Closure;

class IsInstallationPhase {

	public function __construct() {
	}

	public function handle($request, Closure $next) {

		return $next($request);

		return $this->error($request);
	}

	public function error($request) {
		if ($request->ajax()) {
			return response('Unauthorized.', 401);
		} else {
			return redirect('/')->with('error', 'You should be logged in as an admin');
		}
	}

}
