<?php
session_start(); 

include 'DBconnection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Tjek om brugernavn eller e-mail allerede findes
    $check_sql = "SELECT * FROM Brugere WHERE Brugernavn = ? OR email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Brugernavn eller e-mail er allerede i brug.");
    }

    // Opret den nye bruger med adgangskode
    $insert_sql = "INSERT INTO Brugere (Brugernavn, email, password) VALUES (?, ?, ?)";
    $stmt->prepare($insert_sql);
    $stmt->bind_param("sss", $username, $email, $password); 

    if ($stmt->execute()) {
        $_SESSION['Brugernavn'] = $username;
        header("Location: topicside.php"); // Redirect efter oprettelse
        exit;
    } else {
        echo "Der opstod en fejl. Prøv igen.";
    }

    $stmt->close();
    $conn->close();
}
?>

    <style>
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px; 
            overflow: hidden; 
            z-index: 1000; /* Sørger for at bjælken er oven på andre elementer */
        }

        .top-bar img {
            width: 100%; /* Billedet strækkes til at dække hele bredden */
            height: 100%; /* Billedet strækkes til at dække hele højden */
            object-fit: cover; /* Sørger for at billedet dækker hele bjælken uden at ændre proportionerne */
        }

        .home-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            z-index: 1001; /* Sørger for at knappen er oven på bjælken */
        }

        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Brugernavn" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="password" placeholder="Adgangskode" required>
    <button type="submit">Registrer</button>
</form>

<div class="tilbage">
<?php include 'Tilbage.php'; ?>
</div>