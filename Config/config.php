<?php
//Configuration set up file
Config::set("site_name", "Custom MVC design");
Config::set("languages", array('en','fr'));
Config::set("default_time_zone", "Asia/Kolkata");
Config::set('routes', array(
    'admin'=>'_admin_'
));
Config::set('default_route', 'default');
Config::set('default_controller', 'Default');
Config::set('default_action', 'index');
Config::set('default_language', 'en');

//Domain configuration
Config::set('host', 'http://localhost/php_mvc');

/*** Database Configuration ***/
Config::set('DB_HOST', 'localhost');
/*
    For setting database driver. Use the followings:
 * 1. mysql     :-  for MySql Database Server
 * 2. pgsql     :-  for Postgres Database Server
 * 3. sqlsrv    :-  for Microsoft SQL Database Server
 */
Config::set('DB_DRIVER', 'mysql');//for postgres
Config::set('DBNAME', 'applications_for_copy');
Config::set('DB_USERNAME', 'root');
Config::set('DB_PASSWORD', '');
