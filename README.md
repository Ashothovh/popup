<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Popup Project
Laravel version - 9

1. Clone the repository
2. Make first simple configurations (env, key generate,  migrate) 
3. run the commands npm install && npm run dev if needed for nice login and register view / bootstrap used
4. Register an admin
5. Login to admin panel for accessing to CRUD of popups
6. Create few popups, 
7. You can activate and inactivate any popup from popups list by clicking on status button before the popup title,
8. In case of creating a new popup the unique code will be generated for that popup, which will be included in script src url in our Api
9. Get the script for each popup in its 'show' page
10. Copy that script into your website and use it.
11. If the status of popup is set as Inactive, then the popup will not be shown anywhere, otherwise you will see it in your page in 10 seconds after page DOM will be created
12. You can see the statistics for popup views in popups list table.
13. In case of issue with local code (the browser can show Cross-Origin Read Blocking (CORB) issue in console and not access to local api), just copy the link of src of generated script into Postman and you can see the responce of popup api
