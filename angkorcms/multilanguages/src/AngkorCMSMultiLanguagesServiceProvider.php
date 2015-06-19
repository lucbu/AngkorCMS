<?php namespace AngkorCMS\MultiLanguages;

use AngkorCMS\MultiLanguages\Commands\AngkorCMSMultiLanguagesInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSMultiLanguagesServiceProvider extends ServiceProvider {

	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/resources/views', 'multilanguages');
		$this->publishes([
			__DIR__ . '/config/angkorcmsmultilanguages.php' => config_path('angkorcmsmultilanguages.php'),
			__DIR__ . '/config/angkorcmschangelang.php' => config_path('angkorcmschangelang.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/multilanguages'),
		]);
		include __DIR__ . '/Http/routes.php';
		
		View::composer('angkorcms/multilanguages/changelang', 'AngkorCMS\MultiLanguages\Http\ViewComposers\ShowComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\MultiLanguages\Http\Controllers\AngkorCMSLangController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmsmultilanguages.install');
		$this->app->singleton('command.angkorcmsmultilanguages.install', function ($app) {
			return new AngkorCMSMultiLanguagesInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.angkorcmsmultilanguages.install',
		];
	}

}
