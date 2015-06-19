<?php namespace AngkorCMS\Slideshow;

use AngkorCMS\Slideshow\Commands\AngkorCMSSlideshowInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSSlideshowServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'slideshow');
		$this->publishes([
			__DIR__ . '/config/angkorcmsslideshows.php' => config_path('angkorcmsslideshows.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/slideshow'),
			__DIR__ . '/js' => base_path('public/js/angkorcmsslideshows'),
		]);
		include __DIR__ . '/Http/routes.php';

		View::composer('angkorcms/slideshow/maker', 'AngkorCMS\Slideshow\Http\ViewComposers\MakerComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\Slideshow\Http\Controllers\AngkorCMSSlideshowController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmsslideshow.install');
		$this->app->singleton('command.angkorcmsslideshow.install', function ($app) {
			return new AngkorCMSSlideshowInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.angkorcmsslideshow.install',
		];
	}

}
