# API with Lumen Framework

<p align="center">
    <img src="https://i.imgur.com/9vCNSg9.png" alt="slim-api">
</p>

## Introduction
Build a simple API with Lumen Framework. This application already implementation JWT for authorization and UUID identifier ID.

### Requirement
- PHP ^8.0
- Lumen ^9.0
- MySql 8.0

### Usage 
- click [use this template](https://github.com/agungprsty/simple-api-with-lumen/generate)
- composer install
- copy ``.env.example`` to ``.env``
- set ``APP_KEY`` execute command :
```bash
php artisan key:generate
```
- set env variable : 

```
DB_DATABASE=<your database>
DB_USERNAME=<your username>
DB_PASSWORD=<your password>

```
- set config file:

```
auth.php.example -> auth.php
jwt.php.example -> jwt.php
logging.php.example -> logging.php
```
- set configuration as your needs 
- for ``JWT_SECRET`` section by run : 
```bash
php artisan jwt:secret
```

### Dummy Data
```
php artisan migrate --seed
```

### Running service
```         
php -S lumen:8000 -t public
```

### Usage service

- open postman or insomnia
- create new request authentication
```
- add name Login, 
- method POST
- url http://localhost:8080/api/auth/login
- add header 
  - Content-Type = application/json
- add body json 
  {
	"email": "develop@example.com",
	"password": "12345678"
  }
```

- create new request profile
```
- add name Me, 
- method GET
- url http://localhost:8080/api/profile/me
- add header 
  - Content-Type = application/json
  - Authorization = bearer {ACCESS_TOKEN}
```

- Next ``do the same thing as request profile for post and todo service.``