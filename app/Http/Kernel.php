<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'admin' => 'App\Http\Middleware\AuthenticatedAsAdmin',
		'angkorcmsajax' => 'AngkorCMS\Medias\Http\Middleware\AngkorCMSAjax',
		'angkorcmslanguage' => 'AngkorCMS\MultiLanguages\Http\Middleware\AngkorCMSLanguage',
		'angkorcmspermissions' => 'AngkorCMS\Users\Http\Middleware\AngkorCMSUserPermissions',
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',
		'installation' => 'App\Http\Middleware\IsInstallationPhase',
	];

}
