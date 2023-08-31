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

#### create book

```http
POST /api/books/

{
    "name" : "Naruto",
    "author" : "Masashi Kishimoto",
    "publish_date" : "1999-01-01"
}
```

#### update book

```http
PUT /api/books/:id

{
    "name" : "Naruto",
    "author" : "Masashi Kishimoto",
    "publish_date" : "1999-01-01"
}
```

#### delete book

```http
DELETE /api/books/:id
```
