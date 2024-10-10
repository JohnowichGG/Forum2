<?php
echo '
<style>
    .top-bar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 50px; /* Angiv højden på bjælken */
        overflow: hidden; /* Skjul overskydende indhold */
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

<div class="top-bar">
    <img src="/Billeder/Bjælk.png" alt="Bjælke Billede" onerror="this.src=\'/Billeder/placeholder.png\'">
</div>
<a href="index.php" class="home-button">Home</a>';
?>
