<?php
include 'Connection.php'; 
?>

<?php
// prepare and bind
$stmt = $conn->prepare("INSERT INTO Brugere (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = $_POST["firstname"];
$lastname = $_POST["firstname"];
$email = $_POST["email"];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>

<a href="InsertGuest.php">Back</a>
<!--
<html>
<body>

Welcome <?php echo $_POST["firstname"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

</body>
</html>
-->
