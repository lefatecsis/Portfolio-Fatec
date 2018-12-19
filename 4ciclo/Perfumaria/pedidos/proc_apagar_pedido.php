<?php
session_start();
include_once("../dbs/conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_pedido = "DELETE FROM pedidos WHERE id='$id'";
	$resultado_pedido = mysqli_query($conn, $result_pedido);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Pedido apagado com sucesso</p>";
		header("Location: listar_pedido.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o pedido não foi apagado com sucesso</p>";
		header("Location: listar_pedido.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um pedido</p>";
	header("Location: listar_pedido.php");
}
