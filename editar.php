<?php
require 'config.php';

$clientes = [];
$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $clientes = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: index.php"); 
        exit;
    } 
}else{
    header("Location: index.php");
}

?>

<h1>Editar Cliente</h1>
<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$clientes['id'];?>"/>
    <label>
        Nome: <input type="text" name="nome" value="<?=$clientes['nome'];?>"/>
    </label>
    <label>
        Email: <input type="text" name="email" value="<?=$clientes['email'];?>"/>
    </label>
    <label>
        Telefone: <input type="text" name="telefone" value="<?=$clientes['telefone'];?>"/>
    </label>
    <input type="submit" value="Atualizar"/>
</form>