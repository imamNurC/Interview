<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Penjelasan Project

Proyek ini merupakan aplikasi berbasis web yang dibangun dengan framework Laravel 8, yang berfokus pada manajemen konten berupa postingan dan komentar. aplikasi ini memungkinkan pengguna untuk membuat post, membaca detail, dan berinteraksi dengan konten yang ada dengan pendekatan relasional 1 Postingan bisa memiliki banyak komentar

## Database Design

| Column       | Type      | Description                    |
| ------------ | --------- | ------------------------------ |
| `id`         | Integer   | Primary key, auto-incrementing |
| `title`      | String    | Title of the post              |
| `body`       | Text      | Content of the post            |
| `created_at` | Timestamp | When the post was created      |
| `updated_at` | Timestamp | When the post was last updated |

### `comments`

| Column       | Type      | Description                        |
| ------------ | --------- | ---------------------------------- |
| `id`         | Integer   | Primary key, auto-incrementing     |
| `post_id`    | Integer   | Foreign key referencing `posts.id` |
| `comment`    | Text      | Content of the comment             |
| `created_at` | Timestamp | When the comment was created       |
| `updated_at` | Timestamp | When the comment was last updated  |


![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/db_design.png)


Menggunakan pendekatan One to Many relationship pada table posts yang memiliki ID yang mewakili relasi di table comments sebagai foreign Key dengan kolom `post_id`. artinya design database untuk project ini mewakili dari tantangan yang di berikan. dengan design ini tujuan aplikasi memungkinkan dapat menampilkan data dari 2 tabel tersebut, baik berupa list maupun detil 

## Screenshot Aplikasi

### login

![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/login.png)

### Register

![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/register.png)

### Create Post

![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/createPost.png)

### List Semua Posts

![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/postList.png)

### Edit Post By Id

![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/editPostDetail.png)

### Post Detail with list semua comments untuk id tersebut

![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/postDetail.png)

### edit komentar di postingan tersebut

![alt text](https://raw.githubusercontent.com/imamNurC/Interview/main/ss/editDetailComment.png)

## Dependency

```
{
    "name": "laravel/laravel",
    "type": "project",
    "description": "The Laravel Framework.",
    "keywords": ["framework", "laravel"],
    "license": "MIT",
    "require": {
        "php": "^7.3|^8.0",
        "fruitcake/laravel-cors": "^2.0",
        "guzzlehttp/guzzle": "^7.0.1",
        "laravel/framework": "^8.75",
        "laravel/sanctum": "^2.11",
        "laravel/tinker": "^2.5",
        "laravel/ui": "^3.4"
    },
    "require-dev": {
        "facade/ignition": "^2.5",
        "fakerphp/faker": "^1.9.1",
        "laravel/sail": "^1.0.1",
        "mockery/mockery": "^1.4.4",
        "nunomaduro/collision": "^5.10",
        "phpunit/phpunit": "^9.5.10"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/"
        }
    },
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi"
        ],
        "post-update-cmd": [
            "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
        ],
        "post-root-package-install": [
            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "@php artisan key:generate --ansi"
        ]
    },
    "extra": {
        "laravel": {
            "dont-discover": []
        }
    },
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true
    },
    "minimum-stability": "dev",
    "prefer-stable": true
}

```

## Instalasi untuk keberlanjutan project
setting kredensial pada .env pada nama database dan sesuaikan dengan database di Lokal masing masin

Install laravel dependency
```
composer install
```

migrasi database struktur  
```
php artisan migrate
```

aktivasi key pada saat konfigurasi .env
```
php artisan key:generate
```

## License

Develop By Imam Nurcakra

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
