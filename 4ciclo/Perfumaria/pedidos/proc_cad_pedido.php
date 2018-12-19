<?php
session_start();
include_once("../dbs/conexao.php");


$idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_STRING);
$dataPedido = filter_input(INPUT_POST, 'dataPedido', FILTER_SANITIZE_STRING);
$idPedido = filter_input(INPUT_POST, 'idPedido', FILTER_SANITIZE_STRING);
$idProduto = filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);


$result_pedido = "INSERT INTO pedidos (idCliente,dataPedido) VALUES ('$idCliente','$dataPedido')";
$resultado_pedido = mysqli_query($conn, $result_pedido);

$result_item = "INSERT INTO item_pedido (idPedido,idProduto,quantidade) VALUES ('$idPedido','$idProduto','$quantidade')";
$resultado_item = mysqli_query($conn, $result_item);



if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Pedido cadastrado com sucesso</p>";
	header("Location: listar_pedido.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Pedido não foi cadastrado com sucesso</p>";
	header("Location: cadastrar_pedido.php");
}
?>
