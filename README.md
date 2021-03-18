# Participate in the conference and share the site

## What is it?
It's a little site for conference organization. It's located [here](https://angelina.trn.albedo.dev/).

## Requires
- [vlucas/phpdotenv](https://packagist.org/packages/vlucas/phpdotenv)
- [jaeger/phpquery-single](https://packagist.org/packages/jaeger/phpquery-single)

## How to launch it on your computer?
To launch the project on your local machine, you should have PHP and MySQL (or another driver) or a local server installed on your machine. Then you should do the next things.
1. Download the archive from GitHub and unpack it.
2. Run your command line and navigate to `src` folder. Install `composer` and all the dependencies there by executing just `composer install` command.
3. Create `.env` file in `src` folder. It defines five constants: `DB_DRIVER`, `DB_HOST`, `DB_NAME`, `DB_USERNAME` and `DB_PASSWORD`. `DB_DRIVER` contains the name of your database driver, `DB_HOST` contains the name of the host where the server is situated, `DB_NAME` equals a string containing the name of your database, `DB_USERNAME` is your username and `DB_PASSWORD` is your password. Remember to replace all the stub values(`your_database_driver`, `your_server_host`, `your_database_name`, `your_username`, `your_password`) with your own ones. The file should look so:
```
    DB_DRIVER="your_database_driver"
    DB_HOST="your_server_host"
    DB_NAME="your_database_name"
    DB_USERNAME="your_username"
    DB_PASSWORD="your_password"
```
4. Create the database by importing `conference.sql` file from `sql` folder to your server. It will contain all members' data such as their *name* and *surname*, *bithdate*, *report subject*, *country*, *phone number*, *e-mail*, *company* in which they work, their *position*, *self-description* and a *photo* that is stored as a binary file.
5. Run your command line and navigate to `src` folder again. Launch your PHP server there by executing `php -S server:port` command. Replace `server` and `port` with your server name and port number accordingly. For example: `php -S localhost:9999`. Start your MySQL server right after that.
6. Try it out.

## Help me to improve it
And so, in conclusion, I want to tell that you can improve the site with me. You can do it this way: if you have noticed an error, please, contact me. My email: loglinn05@gmail.com. I'm looking forward to your feedback!