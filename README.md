# Fragments App

Install dependencies _(post install script will install Bootstrap)_

```
composer install
```

Build assets

```
sass assets/sass/app.scss public/css/app.css
```

Create the file `config/pdo.ini` and define your database connection parameters in it

```ini
driver = mysql
host = localhost
;port = 3306
database = fragments_app
;socket = /path/to/socket
;charset = utf8
username = example
password = example
```

Create the tables

```sql
CREATE TABLE user (id INT NOT NULL AUTO_INCREMENT, username VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL, PRIMARY KEY(id));
```