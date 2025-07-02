# Blog Management System API — Endpoint Details

---

## 1. Register User

**POST** `/api/register`

### Request Headers
 Accept: application/json   
 Content-Type: application/json

### Request Body
```json
{
  "name": "Silon Rajthala",
  "email": "clon@clon.com",
  "password": "clon@123",
  "password_confirmation": "clon@123"
}
```
### Response (201 Created)
```json
{
  "message": "Registered successfully"
}
```

## 2. Login User

**POST** `/api/login`

### Request Headers
 Accept: application/json   
 Content-Type: application/json

### Request Body
```json
{
    "email": "clon@clon.com",
    "password": "clon@123",
}
```
### Response (200 OK)
```json
{
    "message": "Login successful",
    "token": "7|Z1WdLIkNOREk80Hu1KKxhIn9NYk7755HJbGpzSqT016a0c95"
}
```

## 3. Logout User

**POST** `/api/logout`

### Request Headers

Accept: application/json    
Authorization: Bearer {token}

### Request Body

No body required.

### Response (200 OK)
```json
{
    "message": "Logged out"
}
```

## 4. Public Posts Listing

**GET** `api/public/posts`

### Request Headers
 Accept: application/json

### Request Body

No body required.

### Response (200 OK)
```json
{
    "data": [
        {
            "title": "My New Post",
            "author_name": "Silon Rajthala",
            "category_name": "Laravel",
            "created_at": "2025-07-01 13:17:00"
        },
        {
            "title": "Welcome to Laravel Blog",
            "author_name": "Editor",
            "category_name": "Laravel",
            "created_at": "2025-06-30 14:49:59"
        }
    ]
}
```

## 5. List Posts (Authenticated)

**GET** `api/posts`

### Request Headers
 Accept: application/json   
 Authorization: Bearer {token}

### Request Body

None

### Response (200 OK)
```json

[
    {
        "id": 1,
        "title": "Welcome to Laravel api Blog",
        "body": "This is the first post in the this Test.",
        "category_id": 1,
        "author_id": 2,
        "created_at": "2025-06-30T14:49:59.000000Z",
        "updated_at": "2025-06-30T14:49:59.000000Z",
        "author": {
            "id": 2,
            "name": "Editor",
            "email": "editor@example.com",
            "email_verified_at": null,
            "created_at": "2025-06-30T14:49:54.000000Z",
            "updated_at": "2025-06-30T14:49:54.000000Z"
        },
        "category": {
            "id": 1,
            "name": "Laravel",
            "slug": "laravel",
            "created_at": "2025-06-30T14:49:56.000000Z",
            "updated_at": "2025-06-30T14:49:56.000000Z"
        }
    },
    {
        "id": 2,
        "title": "My New  Second Post",
        "body": "This is the content of the  Second post.",
        "category_id": 1,
        "author_id": 3,
        "created_at": "2025-07-01T13:17:00.000000Z",
        "updated_at": "2025-07-01T13:17:00.000000Z",
        "author": {
            "id": 3,
            "name": "Silon Rajthala",
            "email": "clon@clon.com",
            "email_verified_at": null,
            "created_at": "2025-06-30T15:02:15.000000Z",
            "updated_at": "2025-06-30T15:02:15.000000Z"
        },
        "category": {
            "id": 1,
            "name": "Laravel",
            "slug": "laravel",
            "created_at": "2025-06-30T14:49:56.000000Z",
            "updated_at": "2025-06-30T14:49:56.000000Z"
        }
    },
]

```

## 6. Create Post

**POST** `/api/posts`

### Request Headers
 Accept: application/json   
 Authorization: Bearer {token}  
 Content-Type: application/json

### Request Body

```json
{
  "title": "New Post Third Title",
  "body": "This is the content of the Third post.",
  "category_id": 1
}
```

### Response (201 Created)
```json
{
    "title": "New Post Third Title",
    "body": "This is the content of the Third post.",
    "category_id": 1,
    "author_id": 3,
    "updated_at": "2025-07-01T14:39:04.000000Z",
    "created_at": "2025-07-01T14:39:04.000000Z",
    "id": 4
}
```

## 7. Update Post

**PUT** `/api/posts/{post}`

### Request Headers
 Accept: application/json   
 Authorization: Bearer {token}  
 Content-Type: application/json

### Request Body

```json
{
  "title": "Updated Post Content one",
  "body": "Updated Example ONE.",
  "category_id": 2
}
```

### Response (200 OK)
```json
{
  "message": "Post updated successfully",
  "data": {
    "id": 3,
    "title": "Updated Post Content one",
    "body": "Updated Example ONE.",
    "category_id": 2,
    "author_id": 2,
    "created_at": "2025-07-01 14:00:00",
    "updated_at": "2025-07-01 15:00:00"
  }
}

```


## 8. Delete Post

**DELETE** `/api/posts/{post}`

### Request Headers
 Accept: application/json   
 Authorization: Bearer {token}  

### Request Body

None

### Response (200 OK)
```json
{
  "message": "Post deleted successfully"
}

```

## 9. List Categories

**GET** `/api/categories`

### Request Headers
 Accept: application/json   
 Authorization: Bearer {token}  

### Request Body

None

### Response (200 OK)
```json
[
  {
    "id": 1,
    "name": "Laravel",
    "slug": "laravel"
  },
]
```

## 10. Create Category

**POST** `/api/categories`

### Request Headers
 Accept: application/json   
 Authorization: Bearer {token}  
 Content-Type: application/json

### Request Body
```json
{
  "name": "Backend",
  "slug": "backend"
}
```
### Response (201 Created)
```json
{
  "message": "Category created successfully",
  "data": {
    "id": 3,
    "name": "Backend",
    "slug": "backend"
  }
}
```


## 12. Delete Category

**DELETE** `/api/categories/{id}`

### Request Headers  
 Authorization: Bearer {token}

### Request Body
None
### Response (201 Created)
```json
{
  "message": "Category deleted successfully"
}
```


## 13. Category Export

**GET** `/api/categories-export`

### Request Headers  
 Authorization: Bearer {token}
### Request Body
None
### Response (200 OK)
On success, the server responds with the raw binary data of an Excel (`.xlsx`) file. The client should be configured to handle this response as a file download and save it.

The default filename suggested by the server will be `categories.xlsx`.

> **Note:** The response body is not JSON. Attempting to parse it as JSON will result in an error. Use your HTTP client's "Save Response to File" or "Download" feature to handle the output correctly.

## 14. Category Import

**POST** `/api/categories-import`

### Request Headers  
  Accept: application/json   
 Authorization: Bearer {token}  
 Content-Type: application/json
### Request Body
The request must be sent as `form-data`.

| `file` | **File** | **Required.** The `.xlsx` or `.xls` file containing the categories to import. The file must include a header row as described below. |

#### File Structure Example

The first row of the Excel file **must** be a header row with the keys `name` and `slug`. The keys are case-insensitive.

| name          | slug        |
| :------------ | :---------- |
| Electronics   | electronics |
| New Laptops   | new-laptops |

### Response (200 OK)
```json
{
    "message": "Categories imported successfully"
}
```
## 15. Category Export

**GET** `/api/posts-export`

### Request Headers  
 Authorization: Bearer {token}
### Request Body
None
### Response (200 OK)
On success, the server responds with the raw binary data of an Excel (`.xlsx`) file. The client should be configured to handle this response as a file download and save it.

The default filename suggested by the server will be `categories.xlsx`.

> **Note:** The response body is not JSON. Attempting to parse it as JSON will result in an error. Use your HTTP client's "Save Response to File" or "Download" feature to handle the output correctly.

## 16. Post Import

**POST** `/api/posts-import`

### Request Headers  
  Accept: application/json   
 Authorization: Bearer {token}  
 Content-Type: application/json
### Request Body
The request must be sent as `form-data`.

| `file` | **File** | **Required.** The `.xlsx` or `.xls` file containing the categories to import. The file must include a header row as described below. |

### Example File Content

| title                 | body                             | author         | category |
| :-------------------- | :------------------------------- | :------------- | :------- |
| Welcome to Laravel Blog | This is the first post in the system. | Editor         | Laravel  |
| My New Post           | This is the content of the post.   | Silon Rajthala | Laravel  |
| My New Second Post    | This is the content of the Second post. | Silon Rajthala | React    |

> **Note:** Any empty rows in the file will be skipped automatically to prevent import errors.

### Response (200 OK)
```json
{
    "message": "Posts imported successfully"
}
```