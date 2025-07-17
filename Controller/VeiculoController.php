<?php

include_once __DIR__ . '/VeiculoDAO.php';

class VeiculoController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new VeiculoDAO();
    }

    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dao->cadastrar();
            exit;
        }
        include '../View/cad_veiculo.php';
    }

    public function listar()
    {
        $this->dao->selectTodos();
    }

    public function listarMarcas()
    {
        $this->dao->selectMarca();
    }

    public function listarModelos()
    {
        $this->dao->selectModelo();
    }

    public function listarPorMarca()
    {
        $this->dao->selectPorMarca();
    }

    public function listarPorModelo()
    {
        $this->dao->selectPorModelo();
    }

    public function buscarID($id)
    {
        $stmt = $this->dao->selectPorId($id);
        if ($stmt && $linha = $stmt->fetch()) {
            $veiculo = new Veiculo($linha);
            include '../View/visualizar_veiculo.php';
        } else {
            echo "Veículo não encontrado.";
        }
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dao->editar();
            exit;
        }
        
        $id = $_GET['id'] ?? $_POST['id'] ?? null;
        if ($id) {
            $stmt = $this->dao->selectPorId($id);
            if ($stmt && $linha = $stmt->fetch()) {
                $veiculo = new Veiculo($linha);
                include '../View/edit_veiculo.php';
            } else {
                echo "Veículo não encontrado.";
            }
        } else {
            echo "ID não informado.";
        }
    }

    public function remover($id)
    {
        $this->dao->remover($id);
        exit;
    }
}

$controller = new VeiculoController();

$action = $_GET['function'] ?? null;
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'cadastrar':
        $controller->cadastrar();
        break;
    case 'listar':
        $controller->listar();
        break;
    case 'listarMarcas':
        $controller->listarMarcas();
        break;
    case 'listarModelos':
        $controller->listarModelos();
        break;
    case 'listarPorMarca':
        $controller->listarPorMarca();
        break;
    case 'listarPorModelo':
        $controller->listarPorModelo();
        break;
    case 'buscarID':
        if ($id) $controller->buscarID($id);
        else echo "ID não informado.";
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'remover':
        if ($id) $controller->remover($id);
        else echo "ID não informado.";
        break;
    default:
        header("Location: ../views/listaVeiculos.php?toast=acessoNegado");
        exit;
}
