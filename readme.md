## Go Queer ##



**Go Queer** is a platform to make your geo-caching game 

### Installation ###
* `install php & composer & git`
* `git clone https://github.com/bamzy/goQueer2.git projectname`
* `cd projectname`
* `composer install`
* Create a local database/username/password and rename *.env.example* into *.env* and update the content by setting DB_DATABASE,DB_USERNAME,DB_PASSWORD to right value
* `php artisan key:generate`
* `php artisan migrate --seed` to create and populate tables
* `php artisan serve` to start the app on http://localhost:8000/
* open localhost:8000 on your browser and enjoy! (only Location and Media section of the website work )
* You can use any of below credentials to login or make your own user by 
 click on register from left column.
* username: aaa@gmail.com
password: 123456

* username: bbb@gmail.com
password: 123456




### Include ###


* [Bootstrap](http://getbootstrap.com) for CSS and jQuery plugins
* [Font Awesome](http://fortawesome.github.io/Font-Awesome) for the nice icons
* [Leaflet](http://leaflet.com) the great map drawing and layer creating tool 


### Features ###

* Home page
* Custom Error Page 404
* Under Construction Error
* Authentication (registration, login, logout, password reset, mail confirmation, throttle)
* Add Media
* Define Locations/Polygons on maps
* Leave Comments on Resources


