<?php namespace -namespace-;

use -namespace-\Commands\-Plugin-InstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class -Plugin-ServiceProvider extends ServiceProvider {

	public function boot() {
		//Allow to use View like view('-folderName-::-view-');
		$this->loadViewsFrom(__DIR__ . '/resources/views', '-folderName-');
		
		//Copy all the file contain in the path defined by the key to the path define by the value
		$this->publishes([
			__DIR__ . '/config/-pluginmin-.php' => config_path('-pluginmin-.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/-vendorName-/-folderName-'),
			__DIR__ . '/js' => base_path('public/js/-pluginmin-'),
		]);
		
		//Include the routes files
		include __DIR__ . '/Http/routes.php';

		//Set a composer on the view, it will be loaded everytime the view is called
		View::composer('-vendorName-/-folderName-/maker', '-namespace-\Http\ViewComposers\MakerComposer');
	}

	public function register() {
		$this->registerCommands();
		
		//Register the controller
		$this->app->make('-namespace-\Http\Controllers\-Object-Controller');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.-pluginmin-.install');
		$this->app->singleton('command.-pluginmin-.install', function ($app) {
			return new -Plugin-InstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.-pluginmin-.install',
		];
	}

}
