<?php		
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM clientes");
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Lista de Clientes:</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $clientes): ?>
        <tr>
            <td><?=$clientes['id'];?></td>
            <td><?=$clientes['nome'];?></td>
            <td><?=$clientes['email'];?></td>
            <td><?=$clientes['telefone'];?></td>
            <td> 
                <a href="editar.php?id=<?=$clientes['id'];?>">[Editar]</a>
                <a href="excluir.php?id=<?=$clientes['id'];?>">[Excluir]</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>
<br>
<button> <a href="cadastrar.php">Cadastrar Cliente</a> </button>
