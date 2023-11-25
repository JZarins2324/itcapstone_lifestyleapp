<?php
if (!$connectionRequestedByApp) {
  header('Location: ../pages/home.php');
  exit();
}

// Setup dotenv functionality
require_once realpath(__DIR__ . "../../lib/phpdotenv/vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "../../");
$dotenv->load();

// Database connection variables
$host = $_ENV['DB_HOST']; // or your database host
$dbname = $_ENV['DB_NAME']; // your database name
$user = $_ENV['DB_USER']; // your database username
$pass = $_ENV['DB_PASSWORD']; // your database password
// $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
