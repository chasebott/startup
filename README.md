# startup
Startup instructions for automated builds.

## Choose the OS you'd like to startup
- Mac OSX
- Chromebook
- Windows 10

### Mac OSX
Powerwash
> Restart Mac and hold `cmd R` on startup
> Open "Disk Utility" and click `Continue`
> Select "Mac HD" and click `Unmount`
> Select "Mac HD" and click `Erase`
> `Quit` "Disk Utility"
> Open "Reinstall OSX"
Setup Apple ID and General Settings.
Using Safari to install the [Chrome browser](https://www.google.com/chrome/?brand=CHBD&gclid=Cj0KCQjwx7zzBRCcARIsABPRscOuxMr9jQqqJWGJqygimF_Zao-asFA1ydCZrZy4-FRW_ZmzaVwvV90aAh6cEALw_wcB&gclsrc=aw.ds) and login to your Google account.

Open up terminal and...


### Chromebook
Powerwash and set up account.
Install linux (Debian 9) via settings menu.

run `sudo apt install php-fpm php` to install PHP

> install deployer
> git clone startup (this repo) -b OperatingSystem
> run `dep startup`
