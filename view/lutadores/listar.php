<?php 
//Página view para listagem de alunos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../../controller/LutadorController.php");

$lutadorCont = new LutadorController();
$lutador= $lutadorCont->listar();

/*echo "<pre>";
print_r($lutador);
echo "</pre>";*/
?>

<?php 
require(__DIR__ . "/../include/header.php");
?>

<h4>Listagem de lutadores</h4>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Organização</th>
            <th>Categorias</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($lutador as $a): ?>
            <tr>
                <td><?= $a->getNome(); ?></td>
                <td><?= $a->getAltura(); ?></td>
                <td><?= $a->getPeso(); ?></td>
                <td><?= $a->getOrganizacao(); ?></td>
                <td><?= $a->getCategoria(); ?></td>
                <td><a href="alterar.php?idLutador=<?= $a->getId() ?>"> 
                        <img src="../../img/btn_editar.png" /> 
                    </a>
                </td>
                <td><a href="excluir.php?idLutador=<?= $a->getId() ?>"
                       onclick="return confirm('Confirma a exclusão?');" > 
                        <img src="../../img/btn_excluir.png" /> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php 
require(__DIR__ . "/../include/footer.php");
?>
    
    
