<?php
Config::set("site_name", "MVC design");
Config::set("languages", array('en','fr'));
Config::set('routes', array(
    'admin'=>'_admin_'
));
Config::set('default_route', 'default');
Config::set('default_controller', 'Default');
Config::set('default_action', 'index');
Config::set('default_language', 'en');
Config::set('host', 'http://localhost/php_mvc');


