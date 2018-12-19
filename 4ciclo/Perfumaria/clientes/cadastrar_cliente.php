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
                              <li ><input name="SendPesqUser" type="submit" value="Pesquisar"></li>
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
               <h3>Cadastrar Clientes</h3>

               <?php
                  if(isset($_SESSION['msg'])){
                  	echo $_SESSION['msg'];
                  	unset($_SESSION['msg']);
                  }
                  ?>
               <form method="POST" action="proc_cad_cliente.php">
                  <label>Nome: </label>
                  <input type="text" name="nome" placeholder="Ex: Maria Santos">
                  <label>CPF: </label>
                  <input type="text" name="endereco" placeholder="123.456.789-0">
                  <label>Telefone: </label>
                  <input type="text" name="telefone" placeholder="Ex: (99)99999-9999">
                  <label>Email: </label>
                  <input type="text" name="login" placeholder="Ex: seuemail@gmail.com">
                  <label>Senha: </label>
                  <input type="text" name="senha" placeholder="***********">			
                  <input class="btn green waves-effect waves-light" type="submit" value="Enviar">
               </form>
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
