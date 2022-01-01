# Participate in the conference and share the project

## What is it?
It's a little site for conference organization.

## Requires
- [vlucas/phpdotenv](https://packagist.org/packages/vlucas/phpdotenv)
- [jaeger/phpquery-single](https://packagist.org/packages/jaeger/phpquery-single)

## How to launch it on your computer?
To launch the project on your local machine, you should have XAMPP installed on your machine. Then you should do the next things.
1. Download the archive from GitHub and extract it to `htdocs` folder. Or run your command line, navigate to `htdocs` folder and execute `git clone https://github.com/loglinn05/conference` command.
2. Run your command line and navigate to `src` folder. Install `composer` and all the dependencies there by executing `composer install` command.
3. Create `.env` file in `src` folder. There are five constants defined in it: `DB_DRIVER`, `DB_HOST`, `DB_NAME`, `DB_USERNAME` and `DB_PASSWORD`. `DB_DRIVER` contains the name of your database driver (`mysql` in this case), `DB_HOST` contains the name of the host where the server is situated (`localhost` in this case), `DB_NAME` equals a string containing the name of your database (`conference` here), `DB_USERNAME` is your username (for example, `root`) and `DB_PASSWORD` is your password (for example, empty password). Remember to replace all the stub values(`your_database_driver`, `your_server_host`, `your_database_name`, `your_username`, `your_password`) with your own ones. The file should look so:
```
    DB_DRIVER="your_database_driver"
    DB_HOST="your_server_host"
    DB_NAME="your_database_name"
    DB_USERNAME="your_username"
    DB_PASSWORD="your_password"
```
An example of `.env` file:
```
    DB_DRIVER="mysql"
    DB_HOST="localhost"
    DB_NAME="conference"
    DB_USERNAME="root"
    DB_PASSWORD=""
```
4. Create the database by importing `conference.sql` file from `sql` folder to your server. It will contain all members' data such as their *name* and *surname*, *bithdate*, *report subject*, *country*, *phone number*, *e-mail*, *company* in which they work, their *position*, *self-description* and a *photo* that is stored as a binary file.
5. Run your command line and navigate to `src` folder again. Launch your PHP server by executing `php -S server:port` command. Replace `server` and `port` with your server name and port number accordingly. For example: `php -S localhost:9999`.
6. Type `server:port` (for example, `localhost:9999`) into the address bar and try it out.

## Help me to improve it
And so, in conclusion, I want to tell that you can improve the project with me. You can do it this way: if you have noticed an error, please, contact me. My email: loglinn05@gmail.com. I'm looking forward to your feedback!