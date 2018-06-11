<?php 
    
    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');

   
    if(!empty($_GET['area']))
      $rows = find('fase', $_GET['area'], 'area');

      $rows_area = find('area', $_GET['area'], 'area');

      $rows_usr_has_area = find2id('usuario_has_area', $_SESSION['id_usuario'], $rows_area['id_area'], 'usuario', 'area');

      if($rows_usr_has_area['flag_introducao'] == 0 ){

         $post = array('tabela' => 'usuario_has_area', 'valor' => 1, 'campo' => 'flag_introducao', 'tabela_id' => 'usuario', 'tabela_id2' => 'area');
          save_item($post, $_SESSION['id_usuario'], $rows_area['id_area']);
      }
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

                $rows_usr_has_fase = find2id('usuario_has_fase', $_SESSION['id_usuario'], $value['id_fase'], 'usuario', 'fase');

          
                
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
<?php 
            if($rows_usr_has_fase['flag_fase'] > 0){ 
?>
            <a href="fase.php?fase=<?php echo $value['id_fase']?>" class="small-box-footer">
              Continuar <i class="fa fa-arrow-circle-right"></i>
            </a>

<?php 
            }
            else if ($rows_usr_has_fase['flag_fase'] == 0) { 
?>
            <a href="fase.php?fase=<?php echo $value['id_fase']?>" class="small-box-footer" style="pointer-events: none;
   cursor: default;">
              Continuar <i class="fa fa-lock"></i>
            </a>
<?php
           }
           if($rows_usr_has_fase['flag_fase'] == 2) { 
?>  
           <a href="fase.php?fase=<?php echo $value['id_fase']?>" class="small-box-footer">
              Resposta <i class="fa fa-arrow-circle-right"></i>
            </a>
<?php 
          }
?>
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

<?php include(FOOTER_TEMPLATE); ?>
</body>
</html>
