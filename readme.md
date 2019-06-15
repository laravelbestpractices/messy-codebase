# Messy Codebase

This is a Laravel application that is intentionally written to violate each known best practices.


### Local environment via Docker


For developing locally, it is recommended to have docker-compose in order to setup all the software required. Just to go the project's root folder and type:

```
docker-compose up -d
```

then you can login to the workspace

for MacOS/Linux
```
docker exec -it reverseproxy-admin_workspace_1 /bin/bash
```
for Windows
```
winpty docker exec -it reverseproxy-admin_workspace_1 bash
```

all the required tools is present inside this container for you to use. Otherwise, feel free to install all the requirements as mentioned above.



### Installation

Copy the .env.example file

```
cp .env.example .env
```

install the dependencies
```
composer install
```

generate app key
```
php artisan key:generate
```

