<?php
$usuarioLogado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Usuário';
?>
<header>
    <link rel="stylesheet" href="../estilos.css">
    <div class="header-content">
        <div class="logo">
            <img src="View/logo.png" alt="Logo" />
            <span>Feedback de Veículos</span>
        </div>
        <nav>
            <a href="home">Home</a>
            <a href="cadastro-veiculo">Cadastrar Veículo</a>
            <a href="cadastro-usuario">Cadastrar Usuário</a>
            <a href="login">Login</a>
        </nav>
        <div class="user-info">
            <?php echo htmlspecialchars($usuarioLogado); ?>
        </div>
    </div>
</header>