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

    .logo-button {
        position: absolute;
        top: 5px; /* Juster positionen af logoet */
        left: 10px; /* Juster positionen af logoet */
        z-index: 1001; /* Sørger for at logoet er oven på bjælken */
    }

    .logo-button img {
        height: 40px; /* Juster højden på logoet */
        width: auto; /* Bevar logoets proportioner */
    }
</style>

<div class="top-bar">
    <img src="/Billeder/Bjælk.png" alt="Bjælke Billede" onerror="this.src='/Billeder/placeholder.png'">
</div>
<a href="topicside.php" class="logo-button">
    <img src="/Billeder/Logo.png" alt="Logo">
</a>
