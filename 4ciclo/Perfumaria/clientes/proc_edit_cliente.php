<?php
session_start();
include_once("../dbs/conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


$result_cliente = "UPDATE clientes SET nome='$nome', cpf='$cpf', telefone='$telefone', email='$email',senha='$senha' WHERE id='$id'";
$resultado_cliente = mysqli_query($conn, $result_cliente);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Cliente editado com sucesso</p>";
	header("Location: listar_cliente.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Cliente não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
}
