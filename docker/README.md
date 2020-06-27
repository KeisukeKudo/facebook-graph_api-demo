# Laravel Starter Kit

## How to use

[See Makefile for command details](./Makefile)

### When creating a new project

#### Use this repository as a submodule.  

```bash
$ mkdir example-project && cd example-project
$ git init
$ git submodule add https://github.com/KeisukeKudo/laravel-starter-kit.git docker
```

#### Edit the env file if you want to specify various versions.  

```bash
$ cp .env.example .env
$ vim .env
```

#### Create a project and launch a container.  

```bash
$ make starter
```

### When included in the project

#### Build and launch.  

```bash
$ make build && make up
```

### Start the console of each container

can be started with `make exec-*`  

#### Nginx

```bash
$ make exec-nginx
```

#### PHP

```bash
$ make exec-php
```

#### Database

```bash
$ make exec-db
```

### Access

#### Application

- https://127.0.0.1  

#### phpmyadmin

- http://127.0.0.1:8000  

#### Database

- HOST: db or laravel-starter-database
  - Connect with **127.0.0.1** from SQL client
- PORT: 3306
- DATABASE: app
- USERNAME: default
- PASSWORD: secret
