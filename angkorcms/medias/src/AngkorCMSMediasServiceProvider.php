<?php namespace AngkorCMS\Medias;

use AngkorCMS\Medias\Commands\AngkorCMSMediasInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSMediasServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'medias');
		$this->publishes([
			__DIR__ . '/config/angkorcmsmedias.php' => config_path('angkorcmsmedias.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/medias'),
			__DIR__ . '/assets' => public_path('AngkorCMS/Medias'),
			//__DIR__ . '/database/migrations' 	=> $this->app->databasePath().'/migrations',
		]);
		include __DIR__ . '/Http/routes.php';
		View::composer('angkorcms\medias\form\selectImage', 'AngkorCMS\Medias\Http\ViewComposers\SelectImageComposer');
		View::composer('angkorcms\medias\form\imagesUrl', 'AngkorCMS\Medias\Http\ViewComposers\ImagesUrlComposer');
		View::composer('angkorcms/medias/form/selectImage', 'AngkorCMS\Medias\Http\ViewComposers\SelectImageComposer');
		View::composer('angkorcms/medias/form/imagesUrl', 'AngkorCMS\Medias\Http\ViewComposers\ImagesUrlComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\Medias\Http\Controllers\AngkorCMSMediaController');
		$this->app->make('AngkorCMS\Medias\Http\Controllers\AngkorCMSImageController');
		$this->app->make('AngkorCMS\Medias\Http\Controllers\AngkorCMSFolderController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmsmedias.install');
		$this->app->singleton('command.angkorcmsmedias.install', function ($app) {
			return new AngkorCMSMediasInstallCommand($app);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return [
			'command.angkorcmsmedias.install',
		];
	}

}