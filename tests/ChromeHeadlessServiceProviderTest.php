<?php

namespace ChromeHeadless\Test;

use Orchestra\Testbench\TestCase;
use ChromeHeadless\ChromeHeadless;
use ChromeHeadless\Laravel\ChromeHeadlessServiceProvider;

class ChromeHeadlessServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ChromeHeadlessServiceProvider::class];
    }
}
