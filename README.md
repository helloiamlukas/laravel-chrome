# A Chrome Headless wrapper for Laravel
[![Build Status](https://img.shields.io/travis/helloiamlukas/laravel-chrome/master.svg?style=flat-square)](https://travis-ci.org/helloiamlukas/chrome-php)
[![StyleCI](https://styleci.io/repos/128403303/shield?branch=master)](https://styleci.io/repos/19386515)

Get the DOM of any webpage by using headless Chrome.

# Requirements
This package requires a stable version of Google Chrome (v63 or higher).

If you want to install it on Ubuntu 16.04 you can do it like this:
```
sudo apt-get update
sudo apt-get install -y libappindicator1 fonts-liberation
wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
sudo dpkg -i google-chrome*.deb
```