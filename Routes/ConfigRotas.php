<?php

include_once __DIR__ . '/Rotas.php';

Rotas::add('/', 'index.php');
Rotas::add('/login', 'View/login.php');
Rotas::add('/home', 'index.php');
Rotas::add('/cadastro-usuario', 'View/cad_usuario.php');
Rotas::add('/cadastro-veiculo', 'View/cad_veiculo.php');
Rotas::add('/sucesso', 'View/sucesso.php');
Rotas::add('/editar-veiculo', 'View/edit_veiculo.php', 'id');
Rotas::add('/dashboard', 'View/dashboard.php', 'id');

// 🚨 Corrigido para aceitar GET ou POST com função na query
Rotas::addExpReg('/login-controller(\?function=\w+)?', 'Controller/LoginController.php');
Rotas::addExpReg('/usuario-controller(\?function=\w+)?', 'Controller/UsuarioController.php');
Rotas::addExpReg('/veiculo-controller(\?function=\w+)?', 'Controller/VeiculoController.php');

Rotas::erro('View/404.php');

Rotas::add('/avaliacoes', 'View/avaliacoes.php', 'id');
Rotas::add('/veiculos', 'View/veiculos.php', 'id');
Rotas::add('/sobre', 'View/sobre.php', 'id');

Rotas::exec();
