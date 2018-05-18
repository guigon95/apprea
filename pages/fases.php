<?php 
    
    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');

   
    if(!empty($_GET['area']))
      $rows = find('fase', $_GET['area'], 'area');
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
        <li><a href="<?php echo BASEURL?>index.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Fases</li>
      </ol>
    </section>

    <!-- Main content -->

    <section class="content">

      <!-- Small boxes (Stat box) -->
      <div class="row">

      <?php 
      if($rows != null){
                
                foreach ($rows as $row => $value) {

      ?>

      
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Fase <?php echo $value['numero_fase']; ?></h3>

              <p><?php echo $value['nome_fase']?></p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="fase.php?fase=<?php echo $value['id_fase']?>" class="small-box-footer">
              Continuar <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
         </div>

        <?php 
                }
        }

        else{
        ?>
        <p><?php echo "Nenhuma fase cadastrada"; ?></p>
        <?php } ?>
             
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
