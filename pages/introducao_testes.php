<?php
  
  require_once ('../config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once(ABSPATH.'functions.php');

  
      if(isset($_GET['area']))
      $id_area = $_GET['area'];

      $rows = find('teste', $id_area, 'area');
      
      $rowArea = find('usuario_has_area', $id_area, 'area');
  

?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="<?php echo BASEURL?>index.php" ?>"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="<?php echo BASEURL?>pages/introducao_area.php?area=<?php echo $id_area ?>"><i class="fa fa-code"></i>Introdução</a></li>
        <li class="active">Fases></li>
      </ol>
    </section>
    </br>

    <!-- Main content -->
    <section class="content">

     


            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Testes </h3>
              <input type="hidden" name="flag_introducao" id="flag_introducao" value="<?php echo $rowArea['flag_introducao'];?>" />

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
<?php 
          if($rows!=null){

                     foreach ($rows as $row => $value) {

                        $alternativas = explode(";", $value['alternativa_teste']);
?>
              <div>
              <?php echo($value['descricao_teste']); ?>
              </div>
                <!-- radio -->
                <div class="form-group">
<?php
                foreach ($alternativas as $alternativasValue){

?>
                
      
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="<?php echo($alternativasValue) ?>">
                      <?php echo($alternativasValue) ?>
                    </label>
                  </div>
                  <?php } ?>
                
                </div>
              </form>
           

<?php

                  }
        }
        else{
          echo("Nenhuma alternativa cadastrada");
        }
?>
          
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

    var flag_introducao = $('#flag_introducao').val();

    if(flag_introducao == 0){
       $.ajax({
              url: 'asyncPages/valida_testes.php',
              method: 'POST',
              data: {valida_testes: 1},
              beforeSend: function(){
              },
              success: function(e){
              }
            });
    }
    
  })
</script>
</body>
</html>
