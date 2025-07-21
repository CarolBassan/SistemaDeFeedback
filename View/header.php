<?php
$usuarioLogado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Usuário';
?>
<header>
    <div class="header-content">
        <div class="logo">
            <span>Feedback de Veículos</span>
        </div>
        <button class="menu-toggle">☰</button>
        <nav class="main-nav">
            <a href="home">Home</a>
            <a href="avaliacoes">Avaliações</a>
            <a href="veiculos">Veículos</a>
            <a href="sobre">Sobre</a>
        </nav>

        <div class="user-info">
            <?php echo htmlspecialchars($usuarioLogado); ?>
        </div>
    </div>
</header>