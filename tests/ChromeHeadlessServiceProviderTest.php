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

    /** @test */
    public function it_can_set_a_custom_user_agent()
    {
        $user_agent = "NiceUserAgent/1.0";
        $this->app->config->set("chrome.user_agent", $user_agent);
        $command = ChromeHeadless::url("https://example.com")->setUserAgent($user_agent)->createCommand();
        $this->assertContains(json_encode($user_agent), $command);
    }

    /** @test */
    public function it_can_set_a_custom_chrome_path()
    {
        $chrome_path = "google-chrome-stable";
        $this->app->config->set("chrome.exec_path", $chrome_path);
        $command = ChromeHeadless::url("https://example.com")->setChromePath($chrome_path)->createCommand();
        $this->assertContains(json_encode($chrome_path), $command);
    }
}
