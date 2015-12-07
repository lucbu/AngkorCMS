<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticatedAsAdmin {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth) {
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!$this->auth->guest()) {
			if ($this->auth->user()->admin == 1) {
				return $next($request);
			}
		}
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
