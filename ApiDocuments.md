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

## -- Import/Export