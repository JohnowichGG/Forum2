<html>
<body>

    <div class="menu">
        <?php include 'menu.php';?>
    </div>

    <form action="DBinsert.php" method="POST">
        First Name: <input type="text" name="firstname"><br>
        Last Name : <input type="text" name="lastname"><br>
        E-mail    : <input type="text" name="email"><br>
        <input type="submit">
    </form>

</body>
</html>
