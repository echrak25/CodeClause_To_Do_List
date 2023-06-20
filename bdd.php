<?php
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
  $stmt = $conn->prepare("INSERT INTO todo_items (text) VALUES (?)");
  $stmt->bind_param("s", $todoText);

  // Execute the statement
  if ($stmt->execute()) {
    echo "To-do item saved successfully.";
  } else {
    echo "Error: " . $stmt->error;
  }

  // Close the statement and connection
  $stmt->close();
  $conn->close();
}
?>
