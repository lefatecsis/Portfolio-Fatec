<?php
  session_start();
   include_once("dbs/conexao.php");
   ?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <title>Doux Arôme | Perfumes Importados</title>
    <link rel="icon" href="assets/img/logo.png"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
  </head>
    <body>
        <ul id="slide-out" class="side-nav fixed z-depth-4">
         <li>
            <div class="userView">
               <div class="background">
                  <img src="assets/img/red.png">
               </div>
               <a href="#!user"><img class="circle" src="assets/img/avatar.svg"></a>
               <a href="#!name"><span class="white-text name">Bem Vindo,</span></a>
               <a href="#!email"><span class="white-text email">Administrador!</span></a>
               <a href="dbs/logout.php"><span class="white-text sair">Sair</span></a>
            </div>
         </li>
         
         <li><a class="active" href="dashboard.php"><i class="material-icons">dashboard</i>Dashboard</a></li>
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
                        <form class="sidebar-form" name="nome" action="clientes/pesquisar_cliente.php" method="post">
                           <div class="input-group">
                              <li><a href="clientes/cadastrar_cliente.php"><i class="material-icons">add</i>Cadastrar</a></li>
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
                        <form class="sidebar-form" name="nome" action="pedidos/pesquisar_pedido.php" method="post">
                           <div class="input-group">
                              <li><a href="pedidos/cadastrar_pedido.php"><i class="material-icons">add</i>Cadastrar</a></li>
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
                        <form class="sidebar-form" name="nome" action="produtos/pesquisar_produto.php" method="post">
                           <div class="input-group">
                              <li><a href="produtos/cadastrar_produto.php"><i class="material-icons">add</i>Cadastrar</a></li>
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
                  <a class="brand-logo center">Doux <img class="circle" src="assets/img/logo1.svg" width="60px" height="60px"/> Arôme</a>
               </div>
            </nav>
            <!-- Stat Boxes -->
            <div class="row">
               <div class="col l3 s6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                     <div class="inner">
                        <h3>420</h3>
                        <p>Clientes</p>
                     </div>
                     <div class="icon">
                        <i class="large material-icons ">person</i>
                     </div>
                     <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col l3 s6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                     <div class="inner">
                        <h3>50</h3>
                        <p>Pedidos</p>
                     </div>
                     <div class="icon">
                        <i class="large material-icons ">assignment</i>
                     </div>
                     <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col l3 s6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                     <div class="inner">
                        <h3>360</h3>
                        <p>Produtos</p>
                     </div>
                     <div class="icon">
                        <i class="large material-icons ">shop</i>
                     </div>
                     <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col l3 s6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                     <div class="inner">
                        <h3>10</h3>
                        <p>Emails</p>
                     </div>
                     <div class="icon">
                        <i class="large material-icons ">email</i>
                     </div>
                     <a href="#" class="small-box-footer" class="animsition-link">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <div class="container">
                  <div class="quick-links center-align">
                     <h3>Quick Links</h3>
                     <div class="row">
                        <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar"><a class="waves-effect waves-light btn-large" href="clientes/cadastrar_cliente.php">Clientes</a></div>
                        <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar"><a class="waves-effect waves-light btn-large" href="pedidos/cadastrar_pedido.php">Pedidos</a></div>
                        <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar"><a class="waves-effect waves-light btn-large" href="produtos/cadastrar_produto.php">Produtos</a></div>
                        <div class="col l3 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="Email"><a class="waves-effect waves-light btn-large" href="#">Emails</a></div>
                        <div class="col l4 offset-l4 s12 tooltipped" data-position="top" data-delay="50" data-tooltip="CO Support Site"><a class="waves-effect waves-light btn-large" href="#">Support Site</a></div>
                     </div>
                  </div>
               </div>
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
    