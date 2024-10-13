<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Penjelasan Project

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

## Screenshot Aplikasi

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

1. Buat admin panel yang bisa manajemen data dari 2 tabel disertai fitur Login 2. Dua tabel tersebut memiliki relasi one to many 3. Buat page untuk menampilkan data 2 tabel tersebut, baik berupa list maupun detil 4. Buat fitur untuk pencarian data 5. Semua respon berbentuk Page 6. Gunakan pattern MVC 7. Gunakan repository git (github / gitlab / bitbucket) 8. Buat file readme di repository git yang setidaknya berisi
   a. penjelasan project
   b. desain database
   c. screenshot aplikasi
   d. dependency
   e. informasi lain yang memudahkan developer selanjutnya meneruskan project ini 9. Buat video demo aplikasi menggunakan aplikasi screencast, setidaknya video berisi:
   a. Login
   b. CRUD 2 tabel
   c. Testing API di postman semua endpoint
   d. Penjelasan tentang fitur yang dibuat serta pemilihan data yang ditampilkan
   e. Penjelasan implementasi pattern MVC dalam source code
   f. Penjelasan implementasi Error Handling

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
