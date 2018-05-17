<?php

  include ('../config.php');

  require'../includes/header.php';
  require '../includes/sidebar.php';

?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Teste de Sotfware
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php getenv('BASEURL')?>index.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Introdução</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Introdução </h3>
            </div>
            <div class="box-body">

              <p>O teste de software é uma das áreas de conhecimento da Engenharia de Software,
                que tem como objetivo certificar-se de que o software está abrangendo todas as funcionalidades desejadas
                e se estas estão funcionando corretamente...</p>

            </div>


      </div>

     
          <div align="center" class="timeline-footer">
              <a href="teste_testeDeSoftware.php" class="btn btn-primary btn-xs">Continuar</a>
          </div>

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
   <!-- <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights 
    reserved.-->
  </footer>

  

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
