<?php namespace AngkorCMS\Users;

use AngkorCMS\Users\Commands\AngkorCMSUsersInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSUsersServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'users');
		$this->publishes([
			__DIR__ . '/config/angkorcmsusers.php' => config_path('angkorcmsusers.php'),
			__DIR__ . '/config/angkorcmslogin.php' => config_path('angkorcmslogin.php'),
			__DIR__ . '/config/angkorcmsprofile.php' => config_path('angkorcmsprofile.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/users'),
			__DIR__ . '/resources/lang' => base_path('resources/lang'),
		]);
		include __DIR__ . '/Http/routes.php';

		View::composer('angkorcms/users/profile', 'AngkorCMS\Users\Http\ViewComposers\ShowProfileComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\Users\Http\Controllers\AngkorCMSUsersController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmsusers.install');
		$this->app->singleton('command.angkorcmsusers.install', function ($app) {
			return new AngkorCMSUsersInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.angkorcmsusers.install',
		];
	}

}
