# Mehcanicus

[Laravel SPA (Single Page Application)](https://laravel.com/docs) in Docker. 

## Installation

Clone the repo locally:

```sh
git clone github.com/EduardoJairCano/mechanicus.git
cd mechanicus
```

Run Docker project:

```sh
sail up -d
```

Install NPM dependencies:

```sh
sail npm install
```

Build assets:

```sh
sail npm run dev
```

Setup local database by editing `.env`. Use whatever database (MySQL, Postgres, SQLite) you'd like here.

```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run database migrations:

```sh
sail php artisan migrate
```

## License

Mechanicus App is open-sourced software.
