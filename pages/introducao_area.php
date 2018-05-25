<?php
  ob_start();
  require_once ('../config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once(ABSPATH.'functions.php');

 $rows = null;
 $nome_area = null;
 if(isset($_GET['area']))
  $rows = find('introducao', $_GET['area'], 'area');

  if($rows != null){       
        $rows_usr_has_intro = find2id('usuario_has_introducao', $_SESSION['id_usuario'], $rows['id_introducao'], 'usuario', 'introducao');

        if($rows_usr_has_intro['flag_introducao'] == 0 || !empty($_GET['intro'])){
            $rows_area = find('area', $rows['id_area'], 'area');
            $nome_area = $rows_area['nome_area'];

            $descricao_introducao = $rows['descricao_introducao']; 
           
            $post = array('tabela' => 'usuario_has_introducao', 'valor' => 1, 'campo' => 'flag_introducao', 'tabela_id' => 'usuario', 'tabela_id2' => 'introducao');
            save_item($post, $_SESSION['id_usuario'], $rows['id_introducao']);
        }
        else{
          header("Location: ".BASEURL."pages/fases.php?area=".$rows['id_area']);
        }
  }
  else{
    $descricao_introducao = "Nenhuma Introdução cadastrada";

  }
  ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo ($nome_area)?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo BASEURL?>index.php"><i class="fa fa-dashboard"></i>Início</a></li>
        <li class="active">Introdução</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Introdução</h3>
            </div>
            <div class="box-body">

              <p><?php echo $descricao_introducao?></p>

            </div>


      </div>

     
          <div align="center" class="timeline-footer">
              <a href="introducao_testes.php?area=<?php echo $rows['id_area']?>" class="btn btn-primary btn-xs">Continuar</a>
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
