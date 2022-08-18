<?php
require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');

if($nome && $email){

    $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){
        
        $sql = $pdo->prepare("INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->execute();
        
        header("Location: index.php");
        exit;
    }else{
        header("Location: cadastrar.php");
    }

}else{
    header("Location: cadastrar.php");
    exit;
}


