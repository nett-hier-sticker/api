<?php

// Get config
require($_SERVER["DOCUMENT_ROOT"] . "/config.php");

// DB Connection
$con = mysqli_connect(
  $settings["db"]["host"],
  $settings["db"]["user"],
  $settings["db"]["password"],
  $settings["db"]["name"]
);
if (mysqli_connect_errno()) exit("Error with the Database");

// Get all markers
if ($stmt = $con->prepare("SELECT * FROM " . $settings["db"]["tables"]["markers"])) {
  $stmt->execute();
  $result = $stmt->get_result();
  $markers = $result->fetch_all(MYSQLI_ASSOC);
}
