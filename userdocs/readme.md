# Userdocs

### Setup:

To use Brisket you will need the following technologies installed on your system:
- Apache
- MySQL
- Php

On Linux you can install these via your distro's package manager.

Example for Ubuntu:
`apt-get install apache2`
`apt-get install mysql-server`
`apt-get install php`

Alternatively, for a quick GUI start Linux users can try [XAMPP](https://www.apachefriends.org/index.html)

For macOS users to get started quickly we recommend [MAMP](https://www.mamp.info/en/)

For Windows users to get started quickly we recommend [XAMPP](https://www.apachefriends.org/index.html)

Simply place the files from the implementation folder into the main webserver directory you set up, this will be `htdocs` for MAMP and XAMPP users.


Next follow these instructions:

1. Create a database named "Brisket" in your mysql database. XAMPP and MAMP users can use phpmyadmin to do this easily.
2. Inside the Brisket database run the `img_table.sql` script to set up the image table for Brisket.
3. Inside the Brisket database run the `text_table.sql` script to set up the text table for Brisket.
4. Be sure to start the webserver `service start apache2` or by simply pressing the start button for XAMPP and MAMP users.
5. In db_config.php configure the user and password for your mysql database so Brisket can connect to the Brisket DB.
    - *IMPORTANT* this is set to the root user by default, CHANGE THIS BEFORE DEPLOYING BRISKET INTO A PRODUCTION ENVIRONMENT
    - Since Brisket is currently unreleased, we do not recommend running this in a production environment until an official release is pushed out. Use this development built at your own risk.
6. If your database is running, and your webserver started succesfully, you should be able to visit the Brisket web app at `http://YOUR-IP/index.html` or by clicking the "My Website" feature in MAMP/XAMPP.


Your version of Brisket should be working well! If you wish to run the tests for Brisket simply paste the files from the test folder in the main webserver directory or `htdocs`, and visit `http://YOUR-IP/unit-test.html` or replace `/index.html` with `/unit-test.html` if you clicked "My Website" for MAMP/XAMPP users.
