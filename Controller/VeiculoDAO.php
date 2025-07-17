<?php

include_once  __DIR__ . '/../Model/Veiculo.php';
include_once __DIR__ . '/../Conexao/Conexao.php';

class VeiculoDAO
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function cadastrar()
    {
        $veiculo = new Veiculo($_POST);
        $stmt = $this->conexao->prepare('insert into veiculos (marca, modelo, anoFabricacao) values (:marca, :modelo, :anoFabricacao)');
        $stmt->bindValue(":marca", $veiculo->getMarca());
        $stmt->bindValue(":modelo", $veiculo->getModelo());
        $stmt->bindValue(":anoFabricacao", $veiculo->getAnoFabricacao());
        if ($stmt->execute()) {
            header("Location: ../index.php?toast=cadastroSucesso");
        } else {
            header("Location: ../index.php?toast=cadastroErro");
        }
    }

    public function selectTodos()
    {
        $stmt = $this->conexao->prepare('select * from carros');
        $response = '<div class="col s2"></div><div class="col s10 center-align"><table><thead><tr><th class="center-align">Id</th><th class="center-align">Marca</th><th class="center-align">Modelo</th><th class="center-align">Ano de Fabricação</th><th class="center-align">Editar</th><th class="center-align">Excluir</th></tr></thead><tbody>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $veiculo = new Veiculo($linha);
                $response .= "<tr><td class='center-align'>" . $veiculo->getId() . "</td><td class='center-align'>" . $veiculo->getMarca() . "</td><td class='center-align'>" . $veiculo->getModelo() . "</td><td class='center-align'>" . $veiculo->getAnoFabricacao() . "</td><td class='center-align'><a href='#!' class='blue-text editar' id='" . $veiculo->getId() . "' onclick='editar(this.id)'><span class='material-icons'>mode_edit</span></a></td><td class='center-align'><a href='#!' class='blue-text excluir' id='" . $veiculo->getId() . "' onclick='excluir(this.id)'><span class='material-icons'>delete</span></a></td></tr>";
            }
            $response .= "</tbody></table></div>";
            echo $response;
        } else {
            echo "Erro ao Buscar Veículos";
        }
    }

    public function selectMarca()
    {
        $stmt = $this->conexao->prepare('select distinct marca from veiculos order by marca');
        $response = '<option value="" selected disabled>Selecione a Marca</option>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $veiculo = new Veiculo($linha);
                $response .= "<option value='" . $veiculo->getMarca() . "'>" . $veiculo->getMarca() . "</option>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Marcas";
        }
    }

    public function selectModelo()
    {
        $stmt = $this->conexao->prepare('select distinct modelo from carros order by modelo');
        $response = '<option value="" selected disabled>Selecione o Modelo</option>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $veiculo = new Veiculo($linha);
                $response .= "<option value='" . $veiculo->getModelo() . "'>" . $veiculo->getModelo() . "</option>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Modelos";
        }
    }

    public function selectPorMarca()
    {
        $marca = $_POST['marca'];
        $stmt = $this->conexao->prepare('select * from carros where marca = :marca');
        $stmt->bindValue(":marca", $marca);
        $response = '<div class="col s2"></div><div class="col s10 center-align"><table><thead><tr><th class="center-align">Id</th><th class="center-align">Marca</th><th class="center-align">Modelo</th><th class="center-align">Ano de Fabricação</th><th class="center-align">Editar</th><th class="center-align">Excluir</th></tr></thead><tbody>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $veiculo = new Veiculo($linha);
                $response .= "<tr><td class='center-align'>" . $veiculo->getId() . "</td><td class='center-align'>" . $veiculo->getMarca() . "</td><td class='center-align'>" . $veiculo->getModelo() . "</td><td class='center-align'>" . $veiculo->getAnoFabricacao() . "</td><td class='center-align'><a href='#!' class='blue-text editar' id='" . $veiculo->getId() . "' onclick='editar(this.id)'><span class='material-icons'>mode_edit</span></a></td><td class='center-align'><a href='#!' class='blue-text excluir' id='" . $veiculo->getId() . "' onclick='excluir(this.id)'><span class='material-icons'>delete</span></a></td></tr>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Veículos";
        }
    }

    public function selectPorModelo()
    {
        $modelo = $_POST['modelo'];
        $stmt = $this->conexao->prepare('select * from carros where modelo = :modelo');
        $stmt->bindValue(":modelo", $modelo);
        $response = '<div class="col s2"></div><div class="col s10 center-align"><table><thead><tr><th class="center-align">Id</th><th class="center-align">Marca</th><th class="center-align">Modelo</th><th class="center-align">Ano de Fabricação</th><th class="center-align">Editar</th><th class="center-align">Excluir</th></tr></thead><tbody>';
        if ($stmt->execute()) {
            while ($linha = $stmt->fetch()) {
                $veiculo = new Veiculo($linha);
                $response .= "<tr><td class='center-align'>" . $veiculo->getId() . "</td><td class='center-align'>" . $veiculo->getMarca() . "</td><td class='center-align'>" . $veiculo->getModelo() . "</td><td class='center-align'>" . $veiculo->getAnoFabricacao() . "</td><td class='center-align'><a href='#!' class='blue-text editar' id='" . $veiculo->getId() . "' onclick='editar(this.id)'><span class='material-icons'>mode_edit</span></a></td><td class='center-align'><a href='#!' class='blue-text excluir' id='" . $veiculo->getId() . "' onclick='excluir(this.id)'><span class='material-icons'>delete</span></a></td></tr>";
            }
            echo $response;
        } else {
            echo "Erro ao Buscar Veículos";
        }
    }

    public function selectPorId($id)
    {
        $stmt = $this->conexao->prepare('select * from carros where id = :id');
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function editar()
    {
        $veiculo = new Veiculo($_POST);
        $stmt = $this->conexao->prepare('update carros set marca = :marca, modelo = :modelo, anoFabricacao = :anoFabricacao where id = :id');
        $stmt->bindValue(':marca', $veiculo->getMarca());
        $stmt->bindValue(':modelo', $veiculo->getModelo());
        $stmt->bindValue(':anoFabricacao', $veiculo->getAnoFabricacao());
        $stmt->bindValue(':id', $veiculo->getId());
        if ($stmt->execute()) {
            header("Location: ../index.php?toast=editSucesso");
        } else {
            header("Location: ../index.php?toast=editErro");
        }
    }

    public function remover($id)
    {
        $stmt = $this->conexao->prepare('delete from carros where id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: index.php?toast=deleteSucesso");
        } else {
            header("Location: index.php?toast=deleteErro");
        }
    }
}
