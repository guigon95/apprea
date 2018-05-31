<?php
	ob_start();
  require_once ('config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once('functions.php');

  $rows = find('area', null, null);

  if ($_SESSION['introducao_arduino'] == 0) {
      header('Location: pages/introducao_arduino.php');
  }
  

?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Áreas de conhecimento
      </h1>
      <ol class="breadcrumb">
        <li class="active">Inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

       <!-- Small boxes (Stat box) -->

      <?php if($rows != null){
                
                foreach ($rows as $row => $value) {

      ?>
       <div class="row">

        <div class="col-lg-5 col-md-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $value['nome_area']?></h3>

               <p><?php echo $value['descricao_area'] ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-code"></i>
            </div>
            <a href="pages/introducao_area.php?area=<?php echo $value['id_area'];?>" class="small-box-footer">
              Continuar  <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- /.row -->

      <?php 
                } //end foreach
              }//end if ?>

     

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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
