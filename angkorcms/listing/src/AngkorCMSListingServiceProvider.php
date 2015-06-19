<?php namespace AngkorCMS\Listing;

use AngkorCMS\Listing\Commands\AngkorCMSListingInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSListingServiceProvider extends ServiceProvider {

	public function boot() {
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'listing');
		$this->publishes([
			__DIR__ . '/config/angkorcmslistings.php' => config_path('angkorcmslistings.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/listing'),
			__DIR__ . '/js' => base_path('public/js/angkorcmslistings'),
		]);
		include __DIR__ . '/Http/routes.php';

		//After publishing config file
		View::composer('angkorcms/listing/maker', 'AngkorCMS\Listing\Http\ViewComposers\MakerComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\Listing\Http\Controllers\AngkorCMSListController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmslisting.install');
		$this->app->singleton('command.angkorcmslisting.install', function ($app) {
			return new AngkorCMSListingInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.angkorcmslisting.install',
		];
	}

}
