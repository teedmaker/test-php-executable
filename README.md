### Test PHP Executable

Testing creating a cli php interface.

To run this, install or download this project, then open this directory and run these commands:

````
> php ./bin/main.php {commands}

# or #

> composer maintest {commands}

# or yet: create a alias
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

It's just a experiment!