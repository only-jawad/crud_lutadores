<?php 
//View para inserir alunos

require_once(__DIR__ . "/../../controller/LutadorController.php");
require_once(__DIR__ . "/../../model/Lutadores.php");
require_once(__DIR__ . "/../../model/Categoria.php");
require_once(__DIR__ . "/../../model/Organizacoes.php");

$msgErro = '';
$lutador = null;

if(isset($_POST['submetido'])) {
    //echo "clicou no gravar";
    //Captura os campo do formulário
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $altura = $_POST['altura'] ? $_POST['altura'] : null;
    $peso = $_POST['peso'] ? $_POST['peso'] : null;
    $idOrganizacao = is_numeric($_POST['organizacao']) ? $_POST['organizacao'] : null;
    $idCategoria = is_numeric($_POST['categoria']) ? $_POST['categoria'] : null;
    
    //Criar um objeto Aluno para persistência
    $lutador = new Lutador();
    $lutador->setNome($nome);
    $lutador->setAltura($altura);
    $lutador->setPeso($peso);
    if($idOrganizacao) {
        $organizacao = new Organizacao();
        $organizacao->setId($idOrganizacao);
        $lutador->setOrganizacao($organizacao);
    }
    if($idCategoria) {
        $categoria = new Categoria();
        $categoria->setId($idCategoria);
        $lutador->setCategoria($categoria);
    }

    //Criar um alunoController
    $lutadorCont = new LutadorController();
    $erros = $lutadorCont->inserir($lutador);

    if(! $erros) { //Caso não tenha erros
        //Redirecionar para o listar
        header("location: listar.php");
        exit;
    } else { //Em caso de erros, exibí-los
        $msgErro = implode("<br>", $erros);
        //print_r($erros);
    }
}


//Inclui o formulário
include_once(__DIR__ . "/form.php");


