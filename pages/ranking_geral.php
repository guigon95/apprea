<?php
  ob_start();
  require_once ('../config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once(ABSPATH.'functions.php');

  $rows = null;

  $rows = findRankingGeral();

  ?>

  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo BASEURL?>index.php"><i class="fa fa-dashboard"></i>Início</a></li>
        <li class="active">Ranking Geral</li>
      </ol>
    </section>
      </br>

    <!-- Main content -->
    <section class="content">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ranking Geral</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Patente</th>
                  <th>Média</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if ($rows!=null) {
                     foreach ($rows as $row => $value) { 

                      //$rowUsuario = find('usuario', $value['id_usuario'], 'usuario');
                ?>
                      <tr>
                      <td><?php echo($value['nome_usuario']);?> <?php echo ($value['sobrenome_usuario']);?></td>
                      <td><?php 
                        if($value['id_patente']==2) 
                          echo("Estagiário");
                        elseif($value['id_patente']==12) 
                          echo("Eng. de Software Júnior");
                        elseif($value['id_patente']==22)
                          echo("Eng. de Software Pleno"); 
                        elseif($value['id_patente']==32) 
                          echo("Eng. de Software Sênior");
                        ?></td>
                      <td><?php echo (number_format($value['sum(uf.nota)']/8, 2, ',', ' '));?></td>
                      </tr> 
                <?php
                      }  
                  }
                ?>
                
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->



  

<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- jQuery 3 -->
<?php include(FOOTER_TEMPLATE); ?>


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
