# Local Setup
```
docker-compose build --no-cache
docker-compose up -d
```

## Laravel
```
docker exec -it trai-nam-appc /bin/sh
composer install
cp .env.example .env
php artisan key:generate
npm install
```

## Connect to Navicat
Host: localhost\
Port: 33061\
User: root\
Password: root

## Access
URL: localhost:8080\
Container: `docker exec -it trai-nam-appc /bin/sh`

## XDebug
1. Go to `docker-compose.yml`
2. Edit trai-nam-app > environment > XDEBUG_CONFIG > remote_host = **YOUR local IP**
3. Run `docker-compose up -d`
4. In PHPSTORM, go to Setting and follow my screenshot: https://i.imgur.com/HxuRK7S.png
5. Loop step 1, 2, 3 when local IP is changed.

---

# Basic Commands
Create a new Entity Repository\
```php artisan make:entity <model>```
