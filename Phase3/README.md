## CS6400 Team22 Final Project

##How to replicate your environment

##Database Server:
    Server: Localhost via UNIX socket
    Server type: MySQL
    Server version: 5.7.17 - MySQL Community Server (GPL)
    Protocol version: 10
    User: root@localhost
    Server charset: UTF-8 Unicode (utf8)
    
##Web Server
    Apache
    Database client version: libmysql - mysqlnd 5.0.12-dev - 20150407 - $Id: b396954eeb2d1d9ed7902b8bae237b287f21ad9e $
    PHP extension: mysqliDocumentation curlDocumentation mbstringDocumentation
    PHP version: 7.1.2

##phpMyAdmin:
    Version information: 4.6.6 , latest stable version: 4.7.0
    Documentation
    Official Homepage
    Contribute
    Get support
    List of changes
    License

##What language you are using:
php, HTML, javascript

## Configuring the application

```
define("DB_SERVER", "localhost");
define('DB_PORT', "3306");
define('DB_USER', "gatechUser");
define('DB_PASS', "gatech123");
define('DB_SCHEMA', "cs6400_sp17_team022");
```
Then run the SQL script through phpMyAdmin --> Import to create the DB you need. 
team22_p2_schema.sql
launch the URL: 
http://localhost:8080/6400Spring17Team022/Phase3/home.php

##List of team members:
Yichen Zhu  yzhu421@gatech.edu
Lifeng Wan  lwan33@gatech.edu
Priyanka Gupta  pgupta304@gatech.edu
Jiening Chen jchen702@gatech.edu
