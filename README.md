# PrintBe — Printing Company & Custom Merch Store

![PHP](https://img.shields.io/badge/PHP-8-777BB4?logo=php&logoColor=white)

> Multi-page website for a printing company with shop pages, a blog and a PHP admin panel.

## Overview
A production project built and deployed by **Mahmoud Hasan**. This repository holds the source code only. The client's secrets,
databases, uploaded files and personal data are not included; where the code needs them, they are replaced with placeholders.

**Tech stack:** PHP 8 · JSON storage · Vanilla JS · CSS

## Features
- Pages: home, about, services, shop, product detail, blog, blog post, contact
- Pricing plans, testimonials, 3-step process section
- Admin panel (login, dashboard, content editing); the password is stored as a hash
- Site content stored in `data/site.json`; `.htaccess` blocks the folder from the web
- Shared header and footer includes

## Project structure
```
index.php about.php services.php shop.php product.php blog.php blog-post.php contact.php
inc/        header, footer, data loader
admin/      login, dashboard, save, schema
data/       site content (JSON)
assets/     CSS + JS
```

## Getting started
Upload to a PHP 8 host. Create a password hash with `password_hash()` and paste it into `admin/config.php` (the file explains how).

## Security & privacy
- No credentials in the repository. API keys, passwords and database settings are placeholders (`CHANGE_ME`, `YOUR_…`, `your_db_password`).
- Runtime data (customers, messages, appointments, logs, uploads) is left out.
- Personal names, phone numbers and addresses in the default content are replaced with sample data (e.g. Max Mustermann, +49 151 00000000, Musterstraße 1).

## Author
**Mahmoud Hasan** · [GitHub](https://github.com/MahmoudHasan2)
