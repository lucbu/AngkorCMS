<?php namespace AngkorCMS\Maps;

use AngkorCMS\Maps\Commands\AngkorCMSMapInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSMapsServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'map');
		$this->publishes([
			__DIR__ . '/config/angkorcmsmap.php' => config_path('angkorcmsmap.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/map'),
			__DIR__ . '/js' => base_path('public/js/angkorcmsmap'),
		]);
		include __DIR__ . '/Http/routes.php';

		//After publishing config file
		View::composer('angkorcms/map/maker', 'AngkorCMS\Maps\Http\ViewComposers\MakerComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\Maps\Http\Controllers\AngkorCMSMapController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmsmap.install');
		$this->app->singleton('command.angkorcmsmap.install', function ($app) {
			return new AngkorCMSMapInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.angkorcmsmap.install',
		];
	}

}
