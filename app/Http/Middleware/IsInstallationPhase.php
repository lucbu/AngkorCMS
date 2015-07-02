<?php namespace App\Http\Middleware;

use Closure;
use DB;

class IsInstallationPhase {

	public function __construct() {
	}

	public function handle($request, Closure $next) {

		$r = false;

		try {
			DB::table('migrations')->count();
			$r = true;
		} catch (\Illuminate\Database\QueryException $e) {

		}

		if (!$r) {
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
