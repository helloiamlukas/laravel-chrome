<?php

namespace ChromeHeadless\Laravel;

use ChromeHeadless\ChromeHeadless;
use Illuminate\Support\ServiceProvider;

class ChromeHeadlessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/chrome.php' => config_path('chrome.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/chrome.php', 'chrome');

        $this->app->resolving(ChromeHeadless::class, function (ChromeHeadless $chrome) {
            return $chrome->setChromePath($this->app->config->get('chrome.exec_path'))
                ->setUserAgent($this->app->config->get('chrome.user_agent'))
                ->setBlacklist($this->app->config->get('chrome.blacklist'))
                ->setHeaders($this->app->config->get('chrome.headers'))
                ->setViewport($this->app->config->get('chrome.viewport'))
                ->setTimeout($this->app->config->get('chrome.timeout'));
        });
    }
}
