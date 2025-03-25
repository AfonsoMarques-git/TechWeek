<link rel="stylesheet" href="css/header.css">
<header>
    <div class="navegacao">
        <div class="logo">
            <a href="pagina-principal"><img src="images/Logo-color-letras.png" alt="Logo">
            </a>
        </div>
        <nav class="menu" id="menu">
            <a href="programacao" class="<?php echo basename($_SERVER['PHP_SELF']) == 'programacao.php' ? 'current-page' : ''; ?>">
                Programação
            </a>
            <a href="eventos-anteriores" class="<?php echo basename($_SERVER['PHP_SELF']) == 'eventos-anteriores.php' ? 'current-page' : ''; ?>">
                Eventos Anteriores
            </a>
            <a href="contactos" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contactos.php' ? 'current-page' : ''; ?>">
                Contactos
            </a>
        </nav>
    </div>
</header>