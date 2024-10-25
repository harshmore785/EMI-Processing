## Installation

First clone this repository, install the dependencies, and setup your .env file.

```bash
  git clone https://github.com/harshmore785/EMI-Processing.git
  composer install
  cp .env.example .env
  php artisan key:generate
```

Then create the necessary database and run the initial migrations and seeders.

```bash
  php artisan migrate
  php artisan db:seed

  or

  php artisan migrate --seed
```

Now after run the server by using command

```bash
  php artisan serve
```

Go to generated local server fill the username and password on login page and use the system

```bash
  Username : developer
  Username : Test@Password123#
```
