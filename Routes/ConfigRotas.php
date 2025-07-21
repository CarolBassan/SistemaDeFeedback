<?php

include_once __DIR__ . '/Rotas.php';

Rotas::add('/', 'index.php');
Rotas::add('/login', 'View/login.php');
Rotas::add('/home', 'index.php');
Rotas::add('/cadastro-usuario', 'View/cad_usuario.php');
Rotas::add('/cadastro-veiculo', 'View/cad_veiculo.php');
Rotas::add('/sucesso', 'View/sucesso.php');
Rotas::addGetInt('/editar-veiculo', 'View/edit_veiculo.php', 'id');
Rotas::addGet('/login-controller', 'Controller/LoginController.php', 'function');
Rotas::addGet('/usuario-controller', 'Controller/UsuarioController.php', 'function');
Rotas::addGet('/veiculo-controller', 'Controller/VeiculoController.php', 'function');
Rotas::erro('View/404.php');
Rotas::addGet('/avaliacoes', 'View/avaliacoes.php', 'id');
Rotas::add('/veiculos', 'View/lista-veiculos.php', 'id');
Rotas::addGet('/sobre', 'View/sobre.php', 'id');
Rotas::exec();
