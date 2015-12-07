<?php namespace AngkorCMS\Content;

use AngkorCMS\Content\Commands\AngkorCMSContentInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSContentServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'content');
		$this->publishes([
			__DIR__ . '/config/angkorcmscontent.php' => config_path('angkorcmscontent.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/content'),
		]);
		include __DIR__ . '/Http/routes.php';

		//After publishing config file
		View::composer('angkorcms/content/maker', 'AngkorCMS\Content\Http\ViewComposers\MakerComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\Content\Http\Controllers\AngkorCMSContentController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmscontent.install');
		$this->app->singleton('command.angkorcmscontent.install', function ($app) {
			return new AngkorCMSContentInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.angkorcmscontent.install',
		];
	}

}
