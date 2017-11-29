<?php

namespace App\Providers;

use Illuminate\foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use App\Services\CommentsService;

class CommentsServiceProvider extends ServiceProvider
{
	  /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
	
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        AliasLoader::getInstance()->Alias('Comments', 'App\facades\Comments');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['comments'] = $this->app->share(function($app){
			return new commentsService($app->view);
		});
    }
	
	 /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Connection::class];
	}
}
