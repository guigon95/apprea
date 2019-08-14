<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo(BASEURL)?>dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><b><?php echo $_SESSION['nome_usuario']?></b></p>
          <p><?php 
                        if($_SESSION['id_patente']==2) 
                          echo("Estagiário");
                        elseif($_SESSION['id_patente']==12) 
                          echo("Eng. de Software Júnior");
                        elseif($_SESSION['id_patente']==22)
                          echo("Eng. de Software Pleno"); 
                        elseif($_SESSION['id_patente']==32) 
                          echo("Eng. de Software Sênior");
          ?></p>
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
            <li><a href="<?php echo BASEURL?>pages/introducao_area.php?area=12&intro=100"><i class="fa fa-circle-o"></i>Teste de Software</a></li>
            <li><a href="<?php echo BASEURL?>pages/introducao_area.php?area=22&intro=100"><i class="fa fa-circle-o"></i>Manutenção de Software</a></li>
            <li><a href="<?php echo BASEURL?>pages/introducao_area.php?area=32&intro=100"><i class="fa fa-circle-o"></i>Processo de Software</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Rankings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASEURL?>pages/ranking_geral.php"><i class="fa fa-circle-o"></i>Geral</a></li>
            <li><a href="<?php echo BASEURL?>pages/ranking_patente.php"><i class="fa fa-circle-o"></i>Nível</a></li>
            <li><a href="<?php echo BASEURL?>pages/ranking_nota.php"><i class="fa fa-circle-o"></i>Notas</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Formulários</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="https://forms.gle/vUFqTa2bd13BUEqv5"><i class="fa fa-circle-o"></i>Questionário 1</a></li>
          </ul>
        </li>

          <?php if($_SESSION['admin']==1){ ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Painel Adm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo BASEURL?>pages/lista_alunos.php"><i class="fa fa-circle-o"></i>Alunos</a></li>
          </ul>
        </li>
        <?php   } ?>
        
    </section>
    <!-- /.sidebar -->
  </aside>