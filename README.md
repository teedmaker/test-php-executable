### Test PHP Executable

Test creating a cli php interface.

To run this, clone or download this repository, then open the directory in terminal and run these commands:

````
# download this project (https://github.com/teedmaker/test-php-executable/archive/master.zip)
# open the directory in terminal and run:

> php ./bin/main.php {commands}

# or download and use composer in your computer,
# global or local install according with manual (https://getcomposer.org/download/)
# open the project directory in terminal and run:

> composer install
> composer maintest {commands}

# or yet: create a alias in project directory on terminal:
# 
# ---- windows users
# just if you use [`cmder`](https://cmder.net/) (it's a great package ;) ), you can run this too!
# ----

> alias maintest="php ./bin/main.php"
> maintest {commands}

# it's not oficial run globally yet, but... you can do anything:
# create a alias that points to your php directory

> alias maintest="/path/to/php /path/to/this/bin/main.php"
> cd another/directory/lorem
> maintest {commands}
````

## commands

For now, the only commands that we have is:

> new controller {name} and
> new service {name}

Then, put in your terminal:

````
# create a controller called [Home]Controller
# create a file in `app/controllers/[Home]Controller.php`
# put a example of a controller in there

maintest new controller Home

# create a service in the same way
# create a file in `app/services/[Users]Services.php`

maintest new service Users
````

It's just a experiment!