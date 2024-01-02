# VSSCP
## Vidya Sankalpa Sansthan Career Path

## Setup

```
git clone https://github.com/d-ranjan/vsscp.git
composer update
cp .env.example .env
php artisan key:generate
```
Change 
```
DB_PASSWORD='password'
```
then
```
php artisan migrate:fresh --seed
php artisan serve
```

For Frontend
```
npm install && npm run dev
```
