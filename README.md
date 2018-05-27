# A Chrome Headless wrapper for Laravel
[![Build Status](https://img.shields.io/travis/helloiamlukas/laravel-chrome/master.svg?style=flat-square)](https://travis-ci.org/helloiamlukas/chrome-php)
[![StyleCI](https://styleci.io/repos/128403303/shield?branch=master)](https://styleci.io/repos/128403303)

Get the DOM of any webpage by using headless Chrome.

# Requirements
This package requires the [Puppeteer Chrome Headless Node library](https://github.com/GoogleChrome/puppeteer).
If you want to install it on Ubuntu 16.04 you can do it like this:
```
sudo apt-get update
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
sudo apt-get install -y nodejs gconf-service libasound2 libatk1.0-0 libc6 libcairo2 libcups2 libdbus-1-3 libexpat1 libfontconfig1 libgcc1 libgconf-2-4 libgdk-pixbuf2.0-0 libglib2.0-0 libgtk-3-0 libnspr4 libpango-1.0-0 libpangocairo-1.0-0 libstdc++6 libx11-6 libx11-xcb1 libxcb1 libxcomposite1 libxcursor1 libxdamage1 libxext6 libxfixes3 libxi6 libxrandr2 libxrender1 libxss1 libxtst6 ca-certificates fonts-liberation libappindicator1 libnss3 lsb-release xdg-utils wget
sudo npm install --global --unsafe-perm puppeteer
sudo chmod -R o+rx /usr/lib/node_modules/puppeteer/.local-chromium
```