<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $todoText = $_POST['todoText'];

  // Create a connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare the SQL statement
  $todoText = $conn->real_escape_string($todoText);
  $sql = "INSERT INTO  todos (text) VALUES ('$todoText')";

  // Execute the statement
  if ($conn->query($sql) === TRUE) {
    echo "To-do item saved successfully.";
  } else {
    echo "Error: " . $conn->error;
  }

  // Close the connection
  $conn->close();
}
?>
