./vendor/bin/phpunit --verbose tests/UserTest.php

1. Setup mysql database
2. Configure database configuration inside environment.php

3. Install the database schema
php magi schema:install


Configure the environment database

Import Currencies


php magi import:currencies
php magi import:countries
