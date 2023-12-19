# VSSCP
## Vidya Sankalpa Sansthan Carreer Path

## Setup

```
git clone https://github.com/d-ranjan/vsscp.git
composer update
cp .env.example .env
php artisan key:generate
```
Change 
```
APP_NAME = 'VSSCP | Vidya Sankalpa Sansthan Carreer Path'
DB_DATABASE=vsscp
DB_USERNAME=root
DB_PASSWORD='password'
```
then
```
php artisan migrate --seed
php artisan serve
```

For Frontend
```
npm install && npm run dev
```
