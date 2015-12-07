<?php namespace AngkorCMS\Pages;

use AngkorCMS\Pages\Commands\AngkorCMSPagesInstallCommand;
use Illuminate\Support\ServiceProvider;
use App;
use View;

class AngkorCMSPagesServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'pages');
		$this->publishes([
			__DIR__ . '/config/angkorcmsmodules.php' => config_path('angkorcmsmodules.php'),
			__DIR__ . '/config/angkorcmspages.php' => config_path('angkorcmspages.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/pages'),
			__DIR__ . '/resources/templates/blade' => base_path('resources/views/templates'),
			__DIR__ . '/resources/templates/css' => base_path('public/css'),
			__DIR__ . '/resources/templates/js' => base_path('public/js'),
			__DIR__ . '/js' => base_path('public/js/angkorcmspages'),
		]);

		include __DIR__ . '/Http/routes.php';

		View::composer('angkorcms/pages/groupsmodules/maker', 'AngkorCMS\Pages\Http\ViewComposers\MakerComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\Pages\Http\Controllers\AngkorCMSPageController');
		$this->app->make('AngkorCMS\Pages\Http\Controllers\AngkorCMSModuleController');
		$this->app->make('AngkorCMS\Pages\Http\Controllers\AngkorCMSPageTransController');

		$this->registerAngkorCMSBlade();
		$this->app->alias('angkorblade', 'AngkorCMS\Pages\Facades\AngkorCMSBladeBuilder');
	}

	protected function registerAngkorCMSBlade(){

		$this->app->bindShared('angkorblade', function($app)
		{
			return new Facades\AngkorCMSBladeBuilder();
		});
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmspages.install');
		$this->app->singleton('command.angkorcmspages.install', function ($app) {
			return new AngkorCMSPagesInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'angkorblade',
			'AngkorCMS\Pages\Facades\AngkorCMSBladeBuilder',
			'command.angkorcmspages.install',
		];
	}

}
