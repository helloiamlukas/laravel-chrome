# A Chrome Headless wrapper for Laravel
[![Build Status](https://img.shields.io/travis/helloiamlukas/laravel-chrome/master.svg?style=flat-square)](https://travis-ci.org/helloiamlukas/chrome-php) [![StyleCI](https://styleci.io/repos/128403303/shield?branch=master)](https://styleci.io/repos/128403303)

Get the DOM of any webpage by using headless Chrome.

💡 This is a Laravel wrapper of [helloiamlukas/chrome-php](https://github.com/helloiamlukas/chrome-php).

## Requirements

This package requires the [Puppeteer Chrome Headless Node library](https://github.com/GoogleChrome/puppeteer).

If you want to install it on Ubuntu 16.04 you can do it like this:

```bash
sudo apt-get update
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs gconf-service libasound2 libatk1.0-0 libc6 libcairo2 libcups2 libdbus-1-3 libexpat1 libfontconfig1 libgcc1 libgconf-2-4 libgdk-pixbuf2.0-0 libglib2.0-0 libgtk-3-0 libnspr4 libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 libxcursor1 libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 ca-certificates fonts-liberation libappindicator1 libnss3 lsb-release xdg-utils wget
sudo npm install --global --unsafe-perm puppeteer
sudo chmod -R o+rx /usr/lib/node_modules/puppeteer/.local-chromium
```
## Installation

You can install this package via composer by running:

```bash
composer require helloiamlukas/laravel-chrome
```

After that, the package will automatically register itself.

To publish the configuration file, you need to run:

```bash
php artisan vendor:publish --provider="ChromeHeadless\ChromeHeadlessServiceProvider"
```

This will create a config file at `config/chrome.php`.

## Configuration

The configuration can be found at `config/chrome.php`.

### Custom Chrome Path

You can specify a custom path to your Chrome installation.

```php
/*
|--------------------------------------------------------------------------
| Chrome Path
|--------------------------------------------------------------------------
|
| Manually set the path where Google Chrome is installed.
|
*/
'exec_path' => '/path/to/chrome',
```

### Custom User Agent

You can specify a custom user agent. By default the standard Chrome Headless user agent will be used.

```php
/*
|--------------------------------------------------------------------------
| User Agent
|--------------------------------------------------------------------------
|
| Change the user agent that will be used by Google Chrome.
|
*/
'user_agent' => 'nice-user-agent',
```

### Timeout

You can specify a timeout after which the process will be killed. The timeout should be given in seconds.

```php
/*
|--------------------------------------------------------------------------
| Timeout
|--------------------------------------------------------------------------
|
| Specify a timeout in seconds.
| (null = no timeout)
|
*/
'timeout' => 10,
```

If the process runs out of time a `Symfony\Component\Process\Exception\ProcessTimedOutException` will be thrown.

### Viewport

You can specify a custom viewport that will be used when you make a request. By default the Chrome Headless standard of 800x600px will be used.

```php
/*
|--------------------------------------------------------------------------
| Viewport
|--------------------------------------------------------------------------
|
| Specify a viewport.
|
*/
'viewport' => [
                    'width' => 1920,
                    'height' => 1080
                ],
```

### Blacklist

You can specify a list of regular expressions for files that should not be loaded when you request a website. These expressions will be checked against the url of the file.

```php
/*
|--------------------------------------------------------------------------
| Blacklist
|--------------------------------------------------------------------------
|
| Specify a list of files that should not be loaded.
|
*/
'blacklist' => [
                    'www.google-analytics.com',
                    'analytics.js'
                ],
```

### Custom Headers

You can specify custom headers which will be used for the request. 

```php
/*
|--------------------------------------------------------------------------
| Additional Request Headers
|--------------------------------------------------------------------------
|
| Specify additional headers.
|
*/
'headers' => [
                'DNT' => 1 // DO NOT TRACK
             ],
```

## Usage

Here is a quick example how to use this package:

```php
use ChromeHeadless\ChromeHeadless;

$html = ChromeHeadless::url('https://example.com')->getHtml();
```

Instead of getting the DOM as a string, you can also use the`getDOMCrawler()` method, which will return a `Symfony\Component\DomCrawler\Crawler` instance.

```php
use ChromeHeadless\ChromeHeadless;

$dom = ChromeHeadless::url('https://example.com')->getDOMCrawler();
    
$title = $dom->filter('title')->text();
```

This makes it easy to filter the DOM for specific elements. Check the full documentation [here](https://symfony.com/doc/current/components/dom_crawler.html).

## Testing

You can run the tests by using

```bash
composer test
```
