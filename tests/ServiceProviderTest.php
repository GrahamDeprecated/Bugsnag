<?php

/*
 * This file is part of StyleCI Bugsnag.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StyleCI\Tests\Bugsnag;

use GrahamCampbell\TestBench\Traits\ServiceProviderTestCaseTrait;

/**
 * This is the service provider test class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTestCaseTrait;

    public function testRepositoryFactoryIsInjectable()
    {
        $this->app->config->set('bugsnag.key', 'qwertyuiop');
        $this->assertIsInjectable('Bugsnag_Client');
    }
}
