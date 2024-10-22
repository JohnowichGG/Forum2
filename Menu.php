<style>
    .top-bar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 50px; /* Angiv h�jden p� bj�lken */
        overflow: hidden; /* Skjul overskydende indhold */
        z-index: 1000; /* S�rger for at bj�lken er oven p� andre elementer */
    }

    .top-bar img {
        width: 100%; /* Billedet str�kkes til at d�kke hele bredden */
        height: 100%; /* Billedet str�kkes til at d�kke hele h�jden */
        object-fit: cover; /* S�rger for at billedet d�kker hele bj�lken uden at �ndre proportionerne */
    }

    .logo-button {
        position: absolute;
        top: 5px; /* Juster positionen af logoet */
        left: 10px; /* Juster positionen af logoet */
        z-index: 1001; /* S�rger for at logoet er oven p� bj�lken */
    }

    .logo-button img {
        height: 40px; /* Juster h�jden p� logoet */
        width: auto; /* Bevar logoets proportioner */
    }
</style>

<div class="top-bar">
    <img src="/Billeder/Bj�lk.png" alt="Bj�lke Billede" onerror="this.src='/Billeder/placeholder.png'">
</div>
<a href="topicside.php" class="logo-button">
    <img src="/Billeder/Logo.png" alt="Logo">
</a>
