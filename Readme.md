<h1 align="center">Welcome to api-address 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/php-7.4-blue.svg?cacheSeconds=2592000" />
  <img alt="Version" src="https://img.shields.io/badge/laravel-8.0-red.svg?cacheSeconds=2592000" />
  <a href="https://documenter.getpostman.com/view/13040502/UzBjrney#c3212110-5be6-45bd-b000-95c6538746ca" target="_blank">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" />
  </a>
  <a href="#" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

> The project consists of a Rest Full API with JSON Web Token (JWT) authentication. Relying on good code standards, use of Traits and Form Request Validation. This project has as main objective a constant study on API elaboration in Laravel.

### 🏠 [Documentation API]()

## Prerequisites

* Docker
* Composer

## Install

1. Clone your repository, example:

```sh
git clone https://github.com/edvaldotorres/api-address
```
2. Head over to the project directory.

```sh
cd api-address
```
3. Run the servers

```sh
docker-compose up --build -d
```
NOTE: This may take a while if this is the first time installing this as a container.

4. Set the proper permissions to the project files .

```sh
cd app
```
```sh
chmod -R 777 storage/
```
5. Install the dependencies

```sh
composer install
```
6. Build the migrate.

```sh
docker exec -it app php artisan migrate
```

7. Imports cities.

```sh
docker exec -it app php artisan import:cities (arguments - uf)
```
or

```sh
docker exec -it app php artisan import:cities pe
```

## Usage

1. You can now open your application with API platform: https://localhost/api/

## Author

👤 **Edvaldo Torres de Souza**

* Website: [edvaldotorres.com.br](https://edvaldotorres.com.br/)
* Github: [@edvaldotorres](https://github.com/edvaldotorres)
* LinkedIn: [Edvaldo Torres](https://www.linkedin.com/in/edvaldo-torres-189894150/)

## 🤝 Contributing

Contributions, issues and feature requests are welcome!<br />Feel free to check [issues page](https://github.com/edvaldotorres/api-address/issues). 

## Show your support

Give a ⭐️ if this project helped you!
