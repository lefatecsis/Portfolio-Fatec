<?php
session_start();
include_once("../dbs/conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


$result_cliente = "INSERT INTO clientes (nome,cpf,telefone,email,senha) VALUES ('$nome','$cpf','$telefone','$email','$senha')";
$resultado_cliente = mysqli_query($conn, $result_cliente);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Cliente cadastrado com sucesso</p>";
	header("Location: listar_cliente.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Cliente não foi cadastrado com sucesso</p>";
	header("Location: cadastrar_cliente.php");
}
