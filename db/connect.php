<?php
//connection to MYSQL
//local
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PWD", "");
define("DB_NAME", "smstextcity");

//production
// define("DB_HOST", "localhost");
// define("DB_USER", "fundrea1_por");
// define("DB_PWD", "iOqhy;)Prc?N");
// define("DB_NAME", "fundrea1_portal");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}