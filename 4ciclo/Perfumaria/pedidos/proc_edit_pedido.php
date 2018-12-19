<?php
session_start();
include_once("../dbs/conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_STRING);
$dataPedido = filter_input(INPUT_POST, 'dataPedido', FILTER_SANITIZE_STRING);
//$idPedido = filter_input(INPUT_POST, 'idPedido', FILTER_SANITIZE_STRING);
//$idpedido = filter_input(INPUT_POST, 'idpedido', FILTER_SANITIZE_STRING);
//$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);


$result_pedido = "UPDATE pedidos SET idCliente='$idCliente', dataPedido='$dataPedido' WHERE id='$id'";
$resultado_pedido = mysqli_query($conn, $result_pedido);

//$result_pedido = "UPDATE pedidos SET idCliente='$idCliente', dataPedido='$dataPedido', idPedido='$idPedido', idProuto='$idProuto', quantidade='$quantidade' WHERE id='$id'";
//$resultado_pedido = mysqli_query($conn, $result_pedido);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Pedido editado com sucesso</p>";
	header("Location: listar_pedido.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Pedido não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
}
