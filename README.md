# Fragments App
A blogging web app built with Fragments for demonstration purposes.

## Database setup
1. Create the file `/config/pdo.ini`:

```ini
driver = mysql
host = localhost
;port = 3306
database = fragments_app
;socket = /path/to/socket
;charset = utf8mb4
username = example
password = example
```

2. Create the database (e.g. `fragments_app`) and execute all of the table definition files (SQL) located at `/sql`.