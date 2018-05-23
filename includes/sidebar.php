<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo(BASEURL)?>dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nome_usuario']?></p>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        
        <li>
          <a href="<?php echo BASEURL?>index.php">
            <i class="fa fa-th"></i> <span>Início</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Introduções</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASEURL?>pages/introducao_arduino.php"><i class="fa fa-circle-o"></i>Arduino</a></li>
            <li><a href="<?php echo BASEURL?>pages/introducao_area.php?area=2&intro=100"><i class="fa fa-circle-o"></i>Teste de Software</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Manutenção de Software</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Processo de Software</a></li>
          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->
  </aside>