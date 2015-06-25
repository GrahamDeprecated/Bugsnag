<?php

/*
 * This file is part of StyleCI.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StyleCI\Tests\Bugsnag;

use Bugsnag_Client as Client;
use GrahamCampbell\TestBench\AbstractPackageTestCase;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use StyleCI\Bugsnag\BugsnagServiceProvider;
use StyleCI\Bugsnag\Logger;

/**
 * This is the service provider test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class ServiceProviderTest extends AbstractPackageTestCase
{
    use ServiceProviderTrait;

    protected function getServiceProviderClass($app)
    {
        return BugsnagServiceProvider::class;
    }

    public function testRepositoryFactoryIsInjectable()
    {
        $this->app->config->set('bugsnag.key', 'qwertyuiop');
        $this->assertIsInjectable(Client::class);
    }

    public function testLoggerIsInjectable()
    {
        $this->app->config->set('bugsnag.key', 'qwertyuiop');
        $this->assertIsInjectable(Logger::class);
    }
}
