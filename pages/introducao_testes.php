<?php
  
  require_once ('../config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once(ABSPATH.'functions.php');

 
  $id_area = $_GET['area'];
  

?>
<script type="text/javascript">
  
</script>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="../index.html"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="testeDeSoftware.html"><i class="fa fa-code"></i>Introdução</a></li>
        <li class="active">Testes></li>
      </ol>
    </section>
    </br>

    <!-- Main content -->
    <section class="content">

     
              

            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Questão 1 </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
              <div>
              Em relação aos tipos de teste de software selecione a alternativa correta.
              </div>
                <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                      Option 1
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                      Option 2
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                      Option 3
                    </label>
                  </div>
                </div>
              </form>
            </div>

                 
     

    </section>
    <!-- /.content -->

        <div align="center" class="timeline-footer">
            <a href="fases.php?area=<?php echo $id_area ?>" class="btn btn-primary btn-xs">Continuar</a>
        </div>
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
