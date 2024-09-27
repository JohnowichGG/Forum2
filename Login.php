<?php
session_start(); // Start sessionen

include 'DBconnection.php'; // Inkluder databaseforbindelsen

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Forespørgsel for at tjekke om brugeren findes i databasen
    $sql = "SELECT Brugernavn, password FROM Brugere WHERE Brugernavn = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Tjek om brugeren blev fundet
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verificer adgangskoden
        if (password_verify($password, $row['password'])) {
            // Sæt sessionen
            $_SESSION['Brugernavn'] = $row['Brugernavn'];
            header("Location: Postsubmit.html"); // Redirect til forsiden eller en anden side
            exit;
        } else {
            echo "Ugyldigt brugernavn eller adgangskode.";
        }
    } else {
        echo "Brugeren findes ikke.";
    }

    // Luk forbindelsen
    $stmt->close();
    $conn->close();
}
?>