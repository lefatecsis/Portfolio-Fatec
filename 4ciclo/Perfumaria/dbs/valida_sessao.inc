<?php
session_start();

if(IsSet($_SESSION["nome_usuario"]))
    $nome_usuario = $_SESSION["nome_usuario"];
if(IsSet($_SESSION["senha_usuario"]))
    $senha_usuario = $_SESSION["senha_usuario"];

if(!(empty($nome_usuario) OR empty($senha_usuario)))
{
    require_once 'conecta.php';
	$resultado = mysqli_query($con, "SELECT * FROM clientes WHERE login='$nome_usuario'");
	if(mysqli_num_rows($resultado)==1)
	{
		$dados = mysqli_fetch_array($resultado);
		$senha_banco = $dados["senha"];
		if($senha_usuario != $senha_banco)
		{
	        unset ($_SESSION['nome_usuario']);
    	    unset ($_SESSION['senha_usuario']);
            echo "Você não efetuou o LOGIN!";
            exit;
        }
    }
    else
    {	
        unset ($_SESSION['nome_usuario']);
        unset ($_SESSION['senha_usuario']);
        echo "Você não efetuou o LOGIN!";
        exit;
    }
}
else
{
    echo "Você não efetuou o LOGIN!";
    exit;
}

mysqli_close($con);
?>
