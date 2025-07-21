<?php

include_once __DIR__ . '/Rotas.php';

Rotas::add('/', 'index.php');
Rotas::add('/login', 'View/login.php');
Rotas::add('/home', 'index.php');
Rotas::add('/cadastro-usuario', 'View/cad_usuario.php');
Rotas::add('/cadastro-veiculo', 'View/cad_veiculo.php');
Rotas::add('/sucesso', 'View/sucesso.php');
Rotas::add('/editar-veiculo', 'View/edit_veiculo.php', 'id');
Rotas::add('/user-dashboard', 'View/user-dashboard.php', 'id');
Rotas::addExpReg('/login-controller(\?function=\w+)?', 'Controller/LoginController.php');
Rotas::addExpReg('/usuario-controller(\?function=\w+)?', 'Controller/UsuarioController.php');
Rotas::addExpReg('/veiculo-controller(\?function=\w+)?', 'Controller/VeiculoController.php');
Rotas::erro('View/404.php');
Rotas::add('/avaliacoes', 'View/avaliacoes.php', 'id');
Rotas::add('/avaliacoes', 'View/avaliacoes.php', 'id');
Rotas::add('/veiculos', 'View/lista-veiculos.php', 'id');
Rotas::addGet('/avaliacao', 'View/avaliar-veiculo.php', 'id');
Rotas::add('/agradecimento', 'View/agradecimento.php');
Rotas::add('/sobre', 'View/sobre.php', 'id');
Rotas::exec();
