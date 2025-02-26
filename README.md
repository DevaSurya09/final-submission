# API Documentation

## 💁‍♀️ Allowed HTTP request
- GET : To GET data from the API
- POST    : To send POST request to the API ( Create data )
- PUT     : To send PUT request to the API ( Update data )
- DELETE  : To delete data on the API 

## 📚 Books Attributes
- id `BIGINT` : Unique identifier ( Primary Key )
- book_name `varchar` : Book Name
- description `varchar` : Book Description
- author `BIGINT` : Book Category

## 🔖Endpoints

### 1. Get All Books
**Endpoint:**
```http
GET /library
```
**Description:** Retrieves all books in the library.

**Response Example:**
```json
[
  {
    "id": 1,
    "title": "The Great Gatsby",
    "description": "A classic novel by F. Scott Fitzgerald.",
    "author": "F. Scott Fitzgerald",
    "created_at": "2024-02-26T12:00:00Z",
    "updated_at": "2024-02-26T12:00:00Z"
  }
]
```

---

### 2. Create a New Book
**Endpoint:**
```http
POST /library
```
**Description:** Adds a new book to the library.

**Request Body:**
```json
{
  "title": "1984",
  "description": "A dystopian novel by George Orwell.",
  "author": "George Orwell"
}
```
**Response Example:**
```json
{
  "message": "Book successfully added!",
  "book": {
    "id": 2,
    "title": "1984",
    "description": "A dystopian novel by George Orwell.",
    "author": "George Orwell",
    "created_at": "2024-02-26T12:30:00Z",
    "updated_at": "2024-02-26T12:30:00Z"
  }
}
```

---

### 3. Get a Single Book
**Endpoint:**
```http
GET /library/{id}
```
**Description:** Retrieves details of a specific book by ID.

**Response Example:**
```json
{
  "id": 1,
  "title": "The Great Gatsby",
  "description": "A classic novel by F. Scott Fitzgerald.",
  "author": "F. Scott Fitzgerald",
  "created_at": "2024-02-26T12:00:00Z",
  "updated_at": "2024-02-26T12:00:00Z"
}
```

---

### 4. Update a Book
**Endpoint:**
```http
PUT /library/{id}
```
**Description:** Updates the details of an existing book.

**Request Body:**
```json
{
  "title": "Brave New World",
  "description": "A dystopian novel by Aldous Huxley.",
  "author": "Aldous Huxley"
}
```
**Response Example:**
```json
{
  "message": "Book successfully updated!",
  "book": {
    "id": 1,
    "title": "Brave New World",
    "description": "A dystopian novel by Aldous Huxley.",
    "author": "Aldous Huxley",
    "created_at": "2024-02-26T12:00:00Z",
    "updated_at": "2024-02-26T13:00:00Z"
  }
}
```

---

### 5. Delete a Book
**Endpoint:**
```http
DELETE /library/{id}
```
**Description:** Deletes a book from the library.

**Response Example:**
```json
{
  "message": "Book successfully deleted!"
}
```

---

## Validation Errors
If validation fails, you will receive a 422 response with details:
```json
{
  "errors": {
    "title": ["The title field is required."],
    "author": ["The author field is required."]
  }
}
```

---

## Model Structure
### LibraryModel
```php
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryModel extends Model
{
    use HasFactory;

    protected $table = 'library';
    protected $fillable = ['title', 'description', 'author'];
    public $timestamps = true;
}
```

---

## Routes Summary
| Method | URL | Action |
|--------|-----|--------|
| GET | `/library` | Get all books |
| POST | `/library` | Add a new book |
| GET | `/library/{id}` | Get book details |
| PUT | `/library/{id}` | Update book details |
| DELETE | `/library/{id}` | Delete a book |

---

## Status Codes
- `200 OK` – Request successful
- `201 Created` – Resource created successfully
- `400 Bad Request` – Invalid request data
- `404 Not Found` – Resource not found
- `422 Unprocessable Entity` – Validation errors

---

## Authentication
Currently, this API does not require authentication.

