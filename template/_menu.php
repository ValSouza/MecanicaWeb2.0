<?php 
  
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="../../index3.html" class="brand-link">
    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Controle Financeiro</span>
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
          <a href="gerenciar_setor.php" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Gerenciar Setor
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="gerenciar_modelo.php" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Gerenciar Modelo
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="gerenciar_tipo_modelo.php" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Gerenciar Tipo
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Equipamento
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="adm_equipamento.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Novo equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="consultar_equipamento.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consultar equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="alocar_equipamento.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Alocar equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="remover_equipamento.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Remover equipamento</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Usuario
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="novo_usuario.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Novo usuario</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="consultar_usuario.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Consultar usuario</p>
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