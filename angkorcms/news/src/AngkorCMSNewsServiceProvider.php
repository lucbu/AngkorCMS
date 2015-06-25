<?php namespace AngkorCMS\News;

use AngkorCMS\News\Commands\AngkorCMSNewsInstallCommand;
use Illuminate\Support\ServiceProvider;
use View;

class AngkorCMSNewsServiceProvider extends ServiceProvider {

	public function boot() {
		$this->validationRules();
		$this->loadViewsFrom(__DIR__ . '/resources/views', 'news');
		$this->publishes([
			__DIR__ . '/config/angkorcmsnewsmodule.php' => config_path('angkorcmsnewsmodule.php'),
			__DIR__ . '/config/angkorcmsnews.php' => config_path('angkorcmsnews.php'),
			__DIR__ . '/resources/views' => base_path('resources/views/angkorcms/news'),
			__DIR__ . '/resources/lang' => base_path('resources/views/angkorcms/lang'),
			__DIR__ . '/assets' => public_path('AngkorCMS/News'),
			//__DIR__ . '/database/migrations' 	=> $this->app->databasePath().'/migrations',
		]);
		include __DIR__ . '/Http/routes.php';

		View::composer('angkorcms/news/modules/show', 'AngkorCMS\News\Http\ViewComposers\ShowComposer');
	}

	public function register() {
		$this->registerCommands();
		$this->app->make('AngkorCMS\News\Http\Controllers\AngkorCMSPostController');
		$this->app->make('AngkorCMS\News\Http\Controllers\AngkorCMSCommentController');
	}

	protected function registerCommands() {
		$this->registerMigrateCommand();
	}

	protected function registerMigrateCommand() {
		$this->commands('command.angkorcmsnews.install');
		$this->app->singleton('command.angkorcmsnews.install', function ($app) {
			return new AngkorCMSNewsInstallCommand($app);
		});
	}

	public function provides() {
		return [
			'command.angkorcmsnews.install',
		];
	}

	public function validationRules() {
		$this->app['validator']->extend('tags', function ($attribute, $value, $parameters) {
			$tags = explode(',', $value);
			foreach ($tags as $tag) {
				if (strlen(trim($tag)) > 50) {
					return false;
				}
			}
			return true;
		});
		$this->app['validator']->extend('comment', function ($attribute, $value, $parameters) {
			if (strlen(trim($value)) > 500) {
				// $value must not exceed 500 characters
				return false;
			}
			$mots = explode(' ', $value);
			foreach ($mots as $mot) {
				if (strlen(trim($mot)) > 30) {
					// each words in $value must not exceed 30 characters
					return false;
				}
			}
			return true;
		});
	}

}