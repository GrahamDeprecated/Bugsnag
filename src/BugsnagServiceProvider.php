<?php

/*
 * This file is part of StyleCI Bugsnag.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StyleCI\Bugsnag;

use Bugsnag_Client as Bugsnag;
use Illuminate\Support\ServiceProvider;

/**
 * This is the bugsnag service provider class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class BugsnagServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBugsnag();
    }

    /**
     * Register the bugsnag class.
     *
     * @return void
     */
    protected function registerBugsnag()
    {
        $this->app->singleton('bugsnag', function ($app) {
            $bugsnag = new Bugsnag($app->config->get('bugsnag.key'));

            $bugsnag->setStripPath($app['path.base']);
            $bugsnag->setProjectRoot($app['path']);
            $bugsnag->setAutoNotify(false);
            $bugsnag->setBatchSending(false);
            $bugsnag->setReleaseStage($app->environment());

            if ($app->auth->check()) {
                $bugsnag->setUser(['id' => $app->auth->user()->getAuthIdentifier()]);
            }

            return $bugsnag;
        });

        $this->app->alias('bugsnag', Bugsnag::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'bugsnag',
        ];
    }
}
