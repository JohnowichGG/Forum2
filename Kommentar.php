<!-- Comments.php -->
<html>
<body>
<?php
include 'Connection.php'; 
?>

<form action="comments.php" method="POST">
   guestid (>0): <input type="number" name="guestid" min="1" max="5"><br>
   <input type="submit"> 
</form>



<script>
function myFunction() {
  // Get the value of the input field with id="numb"
  let x = document.getElementById("numb").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (isNaN(x) || x < 1 || x > 10) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }}
  </script>



<?php

if (isset($_POST["guestid"])) { // 2. time

 // always validate userinput backend
 // then always use preparied statments in SQL queries, to prevent SQL injection
 // https://stackoverflow.com/questions/129677/how-can-i-sanitize-user-input-with-php
 // https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php
 
 try {
  $guestid=(int)$_POST["guestid"]; // 0 if fail, cuts to a number
  echo $guestid . "<br>"; // test output
  if($guestid > 0)
  {
     echo "<h1> Hacking comments </h1> <br>";
     include 'DBconnection.php';

     /* Prepared statement, stage 1: prepare */
     $stmt = $conn->prepare("SELECT guestid,  comment FROM Comments WHERE guestID = ?");
     /* Prepared statement, stage 2: bind and execute */
     $stmt->bind_param('i',$guestid); // integer , not string
     $stmt->execute();
     $stmt->bind_result($id, $comment);
     while ($stmt->fetch()) 
       echo "guestID: " . $id. " - Comment: " . $comment.  "<br>"; 
     $conn->close();
  } 
 }
 catch(Exception $e){ // ineffective
   echo "If you see this, the input is not a number, try again" .  "<br>";
 }
}
?>

</body>
</html>
