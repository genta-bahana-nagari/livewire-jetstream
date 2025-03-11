# Laravel Jetstream-Livewire

## Overview
The **CRUD Project** including Jetstream-Livewire package kit.

## Tech Stack
- **Framework:** Laravel (PHP)
- **Frontend:** Blade, Tailwind CSS, Livewire
- **Database:** MySQL
- **Authentication:** Jetstream
- **Deployment:** Nginx / Apache (Cloud or On-Prem)

## Installation
1. Clone this repository:
   ```sh
   git clone https://github.com/genta-bahana-nagari/livewire-jetstream.git
   cd livewire-jetstream
   ```
2. Install dependencies:
   ```sh
   composer install
   npm install
   ```
   Make sure you already have **NodeJS and npm** to develop this kind of project. NodeJS and npm will be used in Tailwind styling (with help 
   extra from Vite)
   
4. Copy the `.env.example` file and set up your environment:
   ```sh
   cp .env.example .env
   ```
5. Generate the application key:
   ```sh
   php artisan key:generate
   ```
6. Configure the database in `.env` and run migrations:
   ```sh
   php artisan migrate
   ```
7. Start the application:
   ```sh
   php artisan serve
   npm run dev #run in the new terminal, same directory.
   ```

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss your ideas.

---
Feel free to contribute, report issues, or suggest improvements!


