# Blog Management System API

A Laravel 12 API for managing users, posts, categories with roles, permissions, and Excel import/export.

---

## Features

- User authentication with Laravel Sanctum (token-based)
- Role & permission management with Spatie Laravel Permission
- Post CRUD (author/admin can edit/delete)
- Category CRUD (admin-only)
- Excel import/export for categories and posts (via Maatwebsite Excel)
- Public posts listing without authentication
- FormRequest validation & API Resources formatting
- Unit tests for key routes

---

## Setup Instructions

### 1. Clone repo

```bash
git clone https://github.com/silonrajthala/blog-api.git
cd blog-management-system
```
### 2. Install dependencies
```bash
composer install
npm install
npm run dev
```
### 3. Setup environment
```bash
Copy .env.example and update:
cp .env.example .env
php artisan key:generate
Update your DB credentials in .env
```
### 4. Run migrations & seed roles/permissions
```bash
php artisan migrate:fresh --seed
```
### 5. Serve application
```bash
php artisan serve
```


## API Endpoints

| Method | Endpoint                   | Description                  | Auth Required | Roles / Permissions           |
|--------|----------------------------|------------------------------|---------------|------------------------------|
| POST   | `/api/register`            | User registration            | No            | —                            |
| POST   | `/api/login`               | User login                   | No            | —                            |
| POST   | `/api/logout`              | User logout                  | Yes           | —                            |
| GET    | `/api/public/posts`        | Public listing of posts      | No            | —                            |
| GET    | `/api/posts`               | List posts                  | Yes           | Any authenticated user       |
| POST   | `/api/posts`               | Create post                  | Yes           | `post-create` permission     |
| PUT    | `/api/posts/{post}`        | Update post                  | Yes           | `post-edit` permission or author/admin |
| DELETE | `/api/posts/{post}`        | Delete post                  | Yes           | `post-delete` permission or author/admin |
| GET    | `/api/posts-export`        | Export posts to Excel        | Yes           | `post-create` or related permission |
| POST   | `/api/posts-import`        | Import posts from Excel      | Yes           | `post-create` permission     |
| GET    | `/api/categories`          | List categories              | Yes           | `category-manage` permission |
| POST   | `/api/categories`          | Create category              | Yes           | `category-manage` permission |
| DELETE | `/api/categories/{id}`     | Delete category              | Yes           | `category-manage` permission |
| GET    | `/api/categories-export`   | Export categories to Excel   | Yes           | `category-manage` permission |
| POST   | `/api/categories-import`   | Import categories from Excel | Yes           | `category-manage` permission |

---

## Excel Import/Export Format

### Categories

| name     | slug     |
|----------|----------|
| Laravel  | laravel  |
| Backend  | backend  |

### Posts

| title      | body             | author_email      | category_name |
|------------|------------------|-------------------|---------------|
| Hello World| My first blog    | clon@clon.com     | Laravel       |
| Vue Tips   | Backend tricks  | test@example.com  | Backend       |

---
