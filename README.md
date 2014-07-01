## fMVC PHP Framework

Why should I use this? Simple

PHP is an **interpreted scripting language** and should not be expected to compile large collections of classes at runtime like other languages such as C. However, many PHP projects simply ignore this and attempt to build web applications with the same massive application design patterns as regular programs. The result is what we have today - websites that just can't handle any decent load.

On the other hand, fMVC is built with performance in mind and a small PHP frameworks. While most frameworks take 2-6MB of RAM to make a simple database request - fMVC can do it in less than 100k while still using the full ORM.

* PHP 5.3+
* Nginx 0.7.x (legacy support for Apache with mod_rewrite)
* PDO if using the Database
* mb_string, [gettext](http://php.net/gettext), [iconv](http://www.php.net/manual/en/book.iconv.php), [ICU INTL](http://php.net/manual/en/book.intl.php) & SPL classes

