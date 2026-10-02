<img width="1043" height="586" alt="image" src="https://github.com/user-attachments/assets/221b7dff-c920-41c3-bfb3-390e8d77ba79" /># A Journey Through Teyvat

<p align="center">
  A fan-made interactive website inspired by the fantasy world of Genshin Impact.
</p>

---

## 📌 Project Overview

**A Journey Through Teyvat** is a fan-made interactive website inspired by the world of **Genshin Impact**.

This project presents an immersive journey through Teyvat by combining cinematic visuals, interactive sections, and informative content about regions, gameplay features, elemental combat, quests, trailers, and updates.

The website is designed to provide an engaging user experience through modern web technologies, smooth animations, GSAP effects, and responsive design.

---

# 📸 Website Preview

## Homepage

![Homepage Preview](<img width="790" height="443" alt="image" src="https://github.com/user-attachments/assets/5d27f176-0777-46d7-a30a-6931a811bc2d" />)

## Teyvat Map

![Teyvat Map Preview](<img width="786" height="426" alt="image" src="https://github.com/user-attachments/assets/234d07e9-5838-4e2b-9531-416951c261a0" />)

## Gameplay Section

![Gameplay Preview](<img width="784" height="427" alt="image" src="https://github.com/user-attachments/assets/f413c403-55f7-49f0-9f6b-b9d2c4478781" />)

## News & Update

![News Preview](<img width="785" height="389" alt="image" src="https://github.com/user-attachments/assets/24b92d38-6536-4979-b760-b9f62abdb9e4" />)

  q

---

# ✨ Features

## 🌎 Teyvat Map

An interactive map section that introduces the nations of Teyvat.

Features:
- Region information display
- Region icons and visual elements
- Interactive exploration experience
- Nation-based presentation

---

## 🎮 Gameplay Experience

A dedicated section showcasing various gameplay experiences in Teyvat.

Includes:

### Exploration
- Discover the world of Teyvat
- Experience adventure elements

### Elemental Combat
- Elemental reaction showcase
- Element combinations
- Combat information

### Quest & Story
- Story-driven adventure presentation
- Quest information

---

## ⚔️ Elemental Combat System

A showcase of the elemental reaction system.

Features:
- Different elemental abilities
- Element combinations
- Reaction explanations
- Visual media presentation

---

## 📖 Quest & Story Section

A section that highlights the adventure and storytelling aspects of Teyvat.

Features:
- Quest categories
- Story information
- Adventure presentation

---

## 🎬 Trailer Showcase

A cinematic trailer section featuring embedded video content.

Purpose:
- Provide visual storytelling
- Enhance user immersion
- Present the atmosphere of Teyvat

---

## 📰 News & Updates

A news section displaying the latest information.

Features:
- Featured news
- Character trailers
- Update information
- Visual card presentation

---

## 📱 Responsive Navigation

The website includes a responsive navigation system.

Features:
- Desktop navigation
- Mobile hamburger menu
- Smooth toggle animation
- Section-based navigation

---

# 🛠️ Technologies Used

## Backend

- **Laravel**

Used as the main backend framework for handling routing, controllers, models, and database interaction.

---

## Frontend

- **Blade Template Engine**

Used for creating reusable components and organizing website layouts.

- **Tailwind CSS**

Used for responsive styling and modern UI implementation.

- **JavaScript**

Used for interactive components and dynamic features.

- **GSAP (GreenSock Animation Platform)**

Used to create smooth animations and enhance the cinematic experience.

- **Vite**

Used for frontend asset bundling and development workflow.

---

## Database & Storage

- **PostgreSQL**

Used for storing structured application data.

- **Supabase Storage**

Used for managing website assets such as images and media files.

---

# 📂 Project Structure

```text
a-journey-through-teyvat
│
├── app
│   ├── Http
│   └── Models
│
├── database
│   ├── migrations
│   └── seeders
│
├── resources
│   ├── views
│   │   ├── components
│   │   └── layouts
│   │
│   ├── css
│   └── js
│
├── routes
│   └── web.php
│
└── public
```

---

# 🚀 Installation & Setup

Follow the steps below to run **A Journey Through Teyvat** locally.

---

## 1. Clone Repository

Clone this repository:

```bash
git clone https://github.com/viatika265/a-journey-through-teyvat.git
```

Move into the project directory:

```bash
cd a-journey-through-teyvat
```

---

## 2. Install Dependencies

Install Laravel backend dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

---

## 3. Configure Environment

Create a copy of the environment configuration file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

Configure your database and Supabase settings inside the `.env` file.

Example:

```env
APP_NAME="A Journey Through Teyvat"
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=pgsql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

---

## 4. Setup Database

Run database migration:

```bash
php artisan migrate
```

Run migration with seed data:

```bash
php artisan migrate --seed
```

The seeder will insert the required application data, including:
- Regions
- Elements
- Gameplay data
- Other resources

---

## 5. Configure Storage & Cache

Clear Laravel cache:

```bash
php artisan optimize:clear
```

Create storage link:

```bash
php artisan storage:link
```

Make sure all required media assets are properly connected through Supabase Storage.

---

## 6. Run Development Server

Start Laravel development server:

```bash
php artisan serve
```

The application will run at:

```text
http://127.0.0.1:8000
```

---

## 7. Run Frontend Development Server

Start Vite:

```bash
npm run dev
```

Vite will compile:

- Tailwind CSS
- JavaScript
- GSAP animations
- Frontend assets

---

# 🏗️ Production Build

Before deployment, generate optimized assets:

```bash
npm run build
```

This will create optimized CSS and JavaScript files for production.

---

# 🌐 Deployment Preparation

Before deploying the application:

1. Update environment settings:

```env
APP_ENV=production
APP_DEBUG=false
```

2. Configure production database settings.

3. Optimize Laravel:

```bash
php artisan optimize
```

4. Build frontend assets:

```bash
npm run build
```

---

# 🛠️ Common Commands

Clear cache:

```bash
php artisan optimize:clear
```

Run migration:

```bash
php artisan migrate
```

Refresh database with seed data:

```bash
php artisan migrate:fresh --seed
```

Run Laravel server:

```bash
php artisan serve
```

Run Vite:

```bash
npm run dev
```

Build production assets:

```bash
npm run build
```

---

# ✅ Requirements

Before installing this project, make sure you have:

- PHP >= 8.2
- Composer
- Node.js & npm
- PostgreSQL
- Laravel Framework
- Supabase Account (for asset storage)

---

# 🎨 Design Concept

The design concept of **A Journey Through Teyvat** is inspired by:

- Fantasy adventure websites
- Cinematic game presentation
- Interactive storytelling experiences
- Genshin Impact visual atmosphere

The interface combines dark fantasy aesthetics, gold accents, smooth transitions, and immersive layouts to create a journey-like experience.

---

# 👥 Team Members

This project was developed by:

| No | Name | Responsibilities |
|----|------|------------------|
| 1 | Devi Atika Putri | Project Lead, Backend Development, Database Design & Management, Frontend Development |
| 2 | Layla Fatiha Laksmana | Frontend Development and User Interface Implementation |
| 3 | Aryanti Puspita Sari | Frontend Development, Database Integration, and Data Management |
| 4 | Shelly Pasaribu | Asset Preparation, Visual Resources Management, and GSAP Animation Implementation |

---

# ⚠️ Disclaimer & Asset Credits

**A Journey Through Teyvat** is a fan-made project created for educational and portfolio purposes.

This website is not affiliated with, endorsed by, or connected to **HoYoverse**.

All Genshin Impact-related assets, including characters, images, icons, logos, and other visual materials, belong to HoYoverse and their respective owners.

Some visual assets used in this project are sourced from official HoYoverse platforms and community resources such as **HoYoLAB**.

This project does not claim ownership of third-party assets and is intended for non-commercial and educational use only.

---

# 👤 Developer

Created by:

**[Dingin Tetapi Tidak Kejam]**

---

# 📜 License

This project is developed for educational and non-commercial purposes.
