<?php
$DB_HOST = "localhost";
$DB_NAME = "mirajxhe_sitechi_user";   // database (confirmed)
$DB_USER = "mirajxhe_sitechi_user";   // user
$DB_PASS = "Miraj12@..";             // password

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
