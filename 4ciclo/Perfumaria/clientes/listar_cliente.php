<?php
   session_start();
    include_once("../dbs/conexao.php");
    ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Doux Arôme | Perfumes Importados</title>
      <link rel="icon" href="../assets/img/logo.png"/>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="../assets/css/custom.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <ul id="slide-out" class="side-nav fixed z-depth-4">
         <li>
            <div class="userView">
               <div class="background">
                  <img src="../assets/img/red.png">
               </div>
               <a href="#!user"><img class="circle" src="../assets/img/avatar.svg"></a>
               <a href="#!name"><span class="white-text name">Bem Vindo,</span></a>
               <a href="#!email"><span class="white-text email">Administrador!</span></a>
               <a href="../dbs/logout.php"><span class="white-text sair">Sair</span></a>
            </div>
         </li>
         <li><a class="active" href="../dashboard.php"><i class="material-icons">dashboard</i>Dashboard</a></li>
         <li>
            <div class="divider"></div>
         </li>
         <li><a class="subheader">Management</a></li>
         <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
               <li>
                  <a class="collapsible-header">Clientes<i class="material-icons ">person</i></a>
                  <div class="collapsible-body">
                     <ul>
                        <form class="sidebar-form" name="nome" action="pesquisar_cliente.php" method="post">
                           <div class="input-group">
                              <li><a href="cadastrar_cliente.php"><i class="material-icons">add</i>Cadastrar</a></li>
                              <li><input type="text" name="nome" class="form-control" placeholder="Pesquisar..."/></li>
                              <li hidden><input name="SendPesqUser" type="submit" value="Pesquisar"></li>
                           </div>
                        </form>
                     </ul>
                  </div>
               </li>
            </ul>
         </li>
         <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
               <li>
                  <a class="collapsible-header">Pedidos<i class="material-icons ">assignment</i></a>
                  <div class="collapsible-body">
                     <ul>
                        <form class="sidebar-form" name="nome" action="../pedidos/pesquisar_pedido.php" method="post">
                           <div class="input-group">
                              <li><a href="../pedidos/cadastrar_pedido.php"><i class="material-icons">add</i>Cadastrar</a></li>
                              <li><input type="text" name="nome" class="form-control" placeholder="Pesquisar..."/></li>
                              <li hidden><input name="SendPesqUser" type="submit" value="Pesquisar"></li>
                           </div>
                        </form>
                     </ul>
                  </div>
               </li>
            </ul>
         </li>
         <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
               <li>
                  <a class="collapsible-header">Produtos<i class="material-icons ">shop</i></a>
                  <div class="collapsible-body">
                     <ul>
                        <form class="sidebar-form" name="nome" action="../produtos/pesquisar_produto.php" method="post">
                           <div class="input-group">
                              <li><a href="../produtos/cadastrar_produto.php"><i class="material-icons">add</i>Cadastrar</a></li>
                              <li><input type="text" name="nome" class="form-control" placeholder="Pesquisar..."/></li>
                              <li hidden><input name="SendPesqUser" type="submit" value="Pesquisar"></li>
                           </div>
                        </form>
                     </ul>
                  </div>
               </li>
            </ul>
         </li>
      </ul>
      <!--................................................................................................................-->
      <main>
         <section class="content">
            <nav>
               <div class="nav-wrapper">
                  <a class="brand-logo center">Doux <img class="circle" src="../assets/img/logo1.svg" width="60px" height="60px"/> Arôme</a>
                  <ul class="right hide-on-med-and-down">
                     <li><i class="material-icons ">search</i></li>
                     <li>
                        <form action="pesquisar_cliente.php" method="post">
                           <input type="text" name="nome" placeholder="Buscar Cliente">
                           <input hidden name="SendPesqUser" type="submit" value="Pesquisar">
                        </form>
                     </li>
                     <li><a href="listar_cliente.php"><i class="material-icons right">list</i>Listar</a></li>
                  </ul>
               </div>
            </nav>
            <!--  -->
            <div class="container"/>
               <h3>Lista de Clientes</h3>               
               <div class="custom-responsive">
                  <table class="striped hover centered">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Nome</th>
                           <th>CPF</th>
                           <th>Telefone</th>
                           <th>E-mail</th>
                           <th>Senha</th>
                           <th>Editar</th>
                           <th>Alterar</th>
                        </tr>
                     </thead>
                     <?php
                        if(isset($_SESSION['msg'])){
                          echo $_SESSION['msg'];
                          unset($_SESSION['msg']);
                        }
                        
                        //Receber o número da página
                        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);   
                        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                        
                        //Setar a quantidade de itens por pagina
                        $qnt_result_pg = 10;
                        
                        //calcular o inicio visualização
                        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                        
                        $result_clientes = "SELECT * FROM clientes LIMIT $inicio, $qnt_result_pg";
                        $resultado_clientes = mysqli_query($conn, $result_clientes);
                        while($row_cliente = mysqli_fetch_assoc($resultado_clientes)){
                          echo "<tr><td>". $row_cliente['id'] . "</td>";
                          echo "<td>" . $row_cliente['nome'] . "</td>";
                          echo "<td>" . $row_cliente['cpf'] . "</td>";
                          echo "<td>" . $row_cliente['telefone'] ."</td>";
                          echo "<td>" . $row_cliente['email'] ."</td>";
                          echo "<td>" . $row_cliente['senha'] . "</td>";
                          echo "<td><a href='editar_cliente.php?id=" . $row_cliente['id'] . "'>Editar</a></td>";
                          echo "<td><a href='proc_apagar_cliente.php?id=" . $row_cliente['id'] . "'>Apagar</a></td></tr>";
                        }
                        ?>
                  </table>
               </div>
               <?php
                  //Paginção - Somar a quantidade de clientes
                  $result_pg = "SELECT COUNT(id) AS num_result FROM clientes";
                  $resultado_pg = mysqli_query($conn, $result_pg);
                  $row_pg = mysqli_fetch_assoc($resultado_pg);
                  //echo $row_pg['num_result'];
                  //Quantidade de pagina 
                  $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                  
                  //Limitar os link antes depois
                  $max_links = 2;
                  echo "<a href='listar_cliente.php?pagina=1'>Primeira</a> ";
                  
                  for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >= 1){
                      echo "<a href='listar_cliente.php?pagina=$pag_ant'>$pag_ant</a> ";
                    }
                  }
                    
                  echo "$pagina ";
                  
                  for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                    if($pag_dep <= $quantidade_pg){
                      echo "<a href='listar_cliente.php?pagina=$pag_dep'>$pag_dep</a> ";
                    }
                  }
                  
                  echo "<a href='listar_cliente.php?pagina=$quantidade_pg'>Ultima</a>";
                  
                  ?>
            </div>
         </section>
      </main>
      <footer class="page-footer">
         <div class="footer-copyright">
            <div class="container">
               © 2018 Doux Arôme. All rights reserved.
            </div>
         </div>
      </footer>
      <!-- So this is basically a hack, until I come up with a better solution. autocomplete is overridden
         in the materialize js file & I don't want that.
         -->
      <!-- Yo dawg, I heard you like hacks. So I hacked your hack. (moved the sidenav js up so it actually works) -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
      <script>
         // Hide sideNav
         $('.button-collapse').sideNav({
         menuWidth: 300, // Default is 300
         edge: 'left', // Choose the horizontal origin
         closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
           draggable: true // Choose whether you can drag to open on touch screens
           });
           $(document).ready(function(){
           $('.tooltipped').tooltip({delay: 50});
           });
           $('select').material_select();
           $('.collapsible').collapsible();
           
      </script>          
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>                   
   </body>
</html>