<?php
  ob_start();
  require_once ('../config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once(ABSPATH.'functions.php');

  $rows = null;

  $rows = findUsuariosOrdenados();

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
        <li class="active">Alunos</li>
      </ol>
    </section>
      </br>

    <!-- Main content -->
    <section class="content">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alunos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Link</th>
                </tr>
                </thead>
                <tbody>
                <?php     
                  if ($rows!=null) {
                     foreach ($rows as $row => $value) { 
                ?>
                      <tr>
                      <td><?php echo($value['nome_usuario'])?> <?php echo($value['sobrenome_usuario'])?></td>
                      <td><a href="<?php echo BASEURL?>pages/alunos.php?id=<?php echo ($value['id_usuario']);?>"><i class="fa fa-edit"> </td>
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
