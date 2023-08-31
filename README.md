## Simple Book API
### Using Laravel and PostgreSQL

#### run laravel

```
php artisan serve
```

server will run on http://localhost:8000/

#### migrate database

```
php artisan migrate
```

#### get all books

```http
GET /api/books/
```

#### get a book

```http
GET /api/books/:id
```
