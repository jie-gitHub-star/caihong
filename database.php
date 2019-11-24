<?php

define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS', '');
define('DB', 'project01');
define('DSN',sprintf('mysql:host=%s;dbname=%s;charset=utf8;port=3306',HOST,DB));
define('DEBUG', false);