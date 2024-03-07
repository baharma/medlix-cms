## Clone & Install

```bash
git clone https://gitlab.com/medlinx/cms-all-landing.git
```

### Install dependency

```bash
composer install
```

### Environment Configuration

Copy the `.env.example` file to create a new `.env` file:

```bash
cp .env.example .env
```

Open the .env file and configure your database connection:

```dotenv
APP_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_test
DB_USERNAME=root
DB_PASSWORD=
```

set `APP_URL=` add with url the project. example: `https://dev.medlinx.co.id/`

#### Add APP Key

```bash
php artisan key:generate
```

## Migrate the Database & Seeding the data

migrate and use the `--seed` flag to seeding the data

```bash
php artisan migrate --seed
```

### Run Application Localy

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser to access the Laravel application.

### Run Application (Server)

By default you need add /public to access the aplication  
example: `https://dev.medlinx.co.id/public`.  
in root folder _.htaccess_ will automatic point to public  
so url just be `https://dev.medlinx.co.id`

If you need to settings medlinx landing, update the .htaccess pointer to `public/medlinx/home`

# Warning!

All data in Landing (medlinx/izidok/iziklaim) is get from CMS /api.  
So please add all data in cms & preview publish to suuccess field the data.
