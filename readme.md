# Library Managment


### Version
0.0.1

### Tech
- Laravel 5.1
- Material UI
- Bootstrap
- jQuery
- Material Icons

### Installation

You need following installed 
- PHP >= 5.5.9 
- MySQL
- NodeJS, Npm, gulp (for elixr)
- SSL (for stripe payment) - optional

update environment configuration details
- database details
- stripe API details if any

Run composer update
```sh
$ composer update
```

run npm
```sh
$ npm install
```
run migration

```sh
$ php artisan migrate
```

populate sample data
```sh
$ php artisan db:seed
```
attach user roles to sample data
```sh
$ php artisan user:update_role
```
compiled assets
```sh
$ gulp
```
run 
```sh
$ php artisan serve
```

