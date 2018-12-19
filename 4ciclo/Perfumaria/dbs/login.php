<?php
include 'conexao.php';
include "conecta_mysql.inc";
// obtém os valores digitados
$email = $_POST["login"];
$senha = $_POST["senha"];
// acesso ao banco de dados

$resultado = mysqli_query($con, "SELECT * FROM clientes where email='$email'");
$linhas = mysqli_num_rows($resultado);
if ($linhas == 0) // testa se a consulta retornou algum registro
{
    echo ("<script>
				window.alert('Usuário não encontrado!')
				window.location.href='login.html';
			</script>");
} else {
    $dados = mysqli_fetch_array($resultado);
    $senha_banco = $dados["senha"];
    if ($senha != $senha_banco) // confere senha
    {
        echo ("<script LANGUAGE='JavaScript'>
window.alert('Senha Incorreta! Por favor digite novamente.')
window.location.href='login.html';
</script>");
    }
    // usuário e senha corretos. Vamos criar os cookies
    else if ($email == "admin") {
        session_start();
        $_SESSION['nome_usuario'] = $email;
        $_SESSION['senha_usuario'] = $senha;
        // direciona para a página inicial dos usuários cadastrados
        header("Location: ../dashboard.php");
    } else {
        session_start();
        $_SESSION['nome_usuario'] = $email;
        $_SESSION['senha_usuario'] = $senha;
        // direciona para a página inicial dos usuários cadastrados
        header("Location: ../index.php");
    }
}
mysqli_close($con);
?>