<?php

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="cliente_consultar.php" class="brand-link">
    <span class="brand-text font-weight-dark">Mecânica Web</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="funcionario.php" class="nav-link">
            <i class="fa fa-wrench"></i>
            <p>
              Funcionários
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fa fa-users"></i>
            <p>
              Cliente
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="clientes.php" class="nav-link">
                <i class="fa fa-bolt"></i>
                <p>Novo cliente</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="consultar_cliente.php" class="nav-link">
                <i class="fa fa-bolt"></i>
                <p>Consultar clientes</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fa fa-sort"></i>
            <p>
              Cadastros
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="servicos.php" class="nav-link">
                <i class="fa fa-anchor"></i>
                <p>Serviços</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="marca.php" class="nav-link">
                <i class="fa fa-road"></i>
                <p>Marcas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="modelos.php" class="nav-link">
                <i class="fa fa-star"></i>
                <p>Modelos</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Sair</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>