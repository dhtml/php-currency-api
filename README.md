./vendor/bin/phpunit --verbose tests/UserTest.php

1. Setup mysql database
2. Configure database configuration inside environment.php

3. Install the database schema
php magi schema:install

4. Import Countries schema
php magi import:countries

5. Import Currencies schema
php magi import:currencies


Configure the environment database

Import Currencies


php magi import:currencies
php magi import:countries
