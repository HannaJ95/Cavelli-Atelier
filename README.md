# Cavelli Atelier — Admin Tool

A web-based admin tool for managing a furniture product catalogue. Built with Laravel 12 and Tailwind CSS v4 as a school project by **Nathalie & Hanna**.

---

## About the Project

Cavelli Atelier is a fictional high-end furniture brand. This admin tool lets staff manage the product catalogue — adding, editing, filtering, and deleting furniture items such as sofas, chairs, tables, and beds.

**Features:**

- Login-protected admin area
- Full CRUD for products (create, read, update, delete)
- Product filtering by type, material, price and sort order
- Pagination on the product listing
- Color and material attribute pages
- Toast notifications on create, update, and delete actions
- Accessible UI: semantic HTML, labeled forms, sufficient color contrast (WCAG AA), keyboard navigable
- Responsive layout — works at different zoom levels

**Tech stack:**

- Laravel 12 (PHP 8.2+)
- Blade components
- Tailwind CSS v4 (via Vite)
- MySQL

---

## Installation

### Prerequisites

Make sure you have the following installed:

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/HannaJ95/Cavelli-Atelier.git
   cd Cavelli-Atelier
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Copy the environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Create the database**
   ```bash
   mysql -u root
   ```
   ```sql
   CREATE DATABASE cavelli_atelier;
   EXIT;
   ```

7. **Configure `.env`**

   Open `.env` and update the database settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=cavelli_atelier
   DB_USERNAME=root
   DB_PASSWORD=
   ```

8. **Run migrations and seed the database**
   ```bash
   php artisan migrate --seed
   ```
   This creates all tables and populates the database with:
   - 14 colors and 14 materials
   - 4 product types (Sofa, Chair, Table, Bed)
   - 20 named furniture products with randomised dimensions, prices, and timestamps

9. **Build frontend assets**
   ```bash
   npm run build
   ```
   Or for development with hot reload:
   ```bash
   npm run dev
   ```

10. **Start the development server**
    ```bash
    php artisan serve
    ```

11. **Open the application**

    Visit [http://localhost:8000](http://localhost:8000) in your browser.

---

## Login

```
Email:    admin@cavelliatelier.se
Password: Ca123!
```

---

## Pages

| Page | URL | Description |
|---|---|---|
| Login | `/` | Authentication page |
| Dashboard | `/dashboard` | Overview / welcome |
| Products | `/products` | Browse, filter, and paginate products |
| Add product | `/products/create` | Create a new product |
| Edit product | `/products/{id}/edit` | Edit an existing product |
| Edit mode | `/products/edit-mode` | List view with delete access |
| Colors | `/attributes/colors` | Manage color attributes |
| Materials | `/attributes/materials` | Manage material attributes |

---

## Accessibility (a11y)

The project implements the five required a11y guidelines:

1. **Semantic HTML** — `<main>`, `<nav>`, `<aside>`, `<article>`, `<fieldset>`, `<legend>`, headings in logical order
2. **Accessible forms** — all inputs have `<label>` elements, error messages use `role="alert"` and `aria-describedby`
3. **Color contrast** — all text meets WCAG AA (4.5:1 minimum); buttons use `#4a7c4a` on white (4.8:1)
4. **Not color-only** — error states use both a red border/ring and a text message; delete actions use both icon and label
5. **Resizable text** — layout uses `rem`/Tailwind units and has been tested at 200% browser zoom
