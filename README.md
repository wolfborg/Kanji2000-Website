# Kanji2000
A Japanese kanji quiz/review website.

Requires PHP5 >= 5.5.0 or PHP7 for the password hashing/verifying.

Older setups probably need to edit register.php, login.php, and the users table in the database.

Installation:
1. Create a kanji2000 database.
2. Import the setup.sql file into your database.
3. Create a kanji2000.ini file in your root directory with the following template of info:
```
[database]
dbusername = root
dbpassword = password
dbname = kanji2000
```
4. Fill in kanji2000.ini with your database info.
5. Point your webservice to the kanji2000 website folder.
6. Start your webservice, access the website.
7. Register a new user through the website.
