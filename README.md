./vendor/bin/phpunit --verbose tests/UserTest.php

phpunit --testsuite Unit  

This was tested in valet setup, but with minimal configuration should be able to work in normal php environments.

After cloning the application to your PC. Ensure you are running php 7.4 and above.

This was tested with PHPUnit 9.5.21 on OSX. Please ensure you have phpunit 9.5 setup on your testing OS.

1. Do a composer install with : 
   $ composer install

2. Setup a new mysql database

3. Configure database configuration inside environment.php

4. Configure the base url inside environment.php as BROWSER_URL
   This is necessary for feature test to pass

6. Install the database schema
    php magi schema:install

7. Import Countries schema
   php magi import:countries

8. Import Currencies schema
    php magi import:currencies

9. Visit frontend in browser to implement basic search  
   BASE_URL = http://agpaytech.test

10. Searching for country
  BASE_URL/api/countries?term=&page=1&limit=10

11. Searching for currencies
    BASE_URL/api/currencies?term=&page=1&limit=10

12. Optimizing the search 
    - the term variable is optional, it searches the fields specified in the model fillable property
    - the page variable is optional, it determines the page of result you wish to check
    - The limit variable is optional, it determines the amount of records to render

13. Run test with any of the following commands
   $ php magi test 
   $ composer test


Additions:
- You can find the screenshots in the screenshot folder
- You can find the test database as sample.sql in the root folder