<html>
<body>

<div class="menu">
<?php include 'menu.php';?>
</div>
<form action="comments.php" method="POST">
$guestid: <input type="text" name="guestid"><br>
<input type="submit">
</form>

<?php
$guestid=$_POST["guestid"];
if (isset($guestid)) {

 include 'DBconnection.php';
 $guestid=$_POST["guestid"];

 $sql = "SELECT id, TopicName FROM Topic ORDER BY id DESC";
 $result = $conn->query($sql);

echo "<h1> Forum Topics </h1> <br>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "TOPIC ID: " . $row["Id"]. " - Topic Name: " . $row["TopicName"].  "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

}
?>

</body>
</html>