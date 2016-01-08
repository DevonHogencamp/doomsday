<?php
define('DBHOST', '127.0.0.1');
define('DBNAME', 'tecvault');
define('DBUSER','root');
define('DBPASSWORD','root');

$con = mysql_connect(DBHOST,DBUSER,DBPASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DBNAME,$con) or die("Failed to connect to MySQL: " . mysql_error());