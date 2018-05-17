 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo BASEURL ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nome_usuario']?></p>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        
        <li>
          <a href="<?php echo BASEURL ?>index.php">
            <i class="fa fa-th"></i> <span>Início</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo BASEURL ?>pages/introducao_arduino.php">
            <i class="fa fa-files-o"></i><span>Introdução</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

      
    </section>
    <!-- /.sidebar -->
  </aside>
