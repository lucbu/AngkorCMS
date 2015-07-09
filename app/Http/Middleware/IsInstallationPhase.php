<?php namespace App\Http\Middleware;

use Closure;
use DB;

class IsInstallationPhase {

	public function __construct() {
	}

	public function handle($request, Closure $next) {

		$installationDone = false;

		try {
			DB::table('migrations')->count();
			$installationDone = true;
		} catch (\Exception $e) {

		}

		if (!$installationDone && env('APP_DEBUG')) {
			return $next($request);
		}

		return $this->error($request);
	}

	public function error($request) {
		if ($request->ajax()) {
			return response('Unauthorized.', 401);
		} else {
			return redirect('/')->with('error', 'The installation has already been done');
		}
	}

}
