 <?php 
    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');
    include ("../includes/modalNota.php");


    if(!empty($_GET['id'])){
      $rows = find('usuario', $_GET['id'], 'usuario');

      //$rows_fase = find('area', $rows['id_area'], 'area');
      $rows_usuario_has_fase = find('usuario_has_fase', $_GET['id'], 'usuario');
    }
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><b>Aluno:</b> <?php echo ($rows['nome_usuario']);?> <?php echo ($rows['sobrenome_usuario']); ?></h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo BASEURL?>index.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="<?php echo BASEURL?>pages/fases.php?area=<?php echo $rows['id_area']?>"><i class="fa fa-code"></i>Fases</a></li>
        <li class="active">Fases de <?php echo $rows['nome_usuario']?></li>
      </ol>
    </section>
    </br>

    <section class="content">

      <!-- Small boxes (Stat box) -->
      <div class="row">

      <?php 
        if($rows_usuario_has_fase != null){
                foreach ($rows_usuario_has_fase as $row => $value) {
               

                         $rows_fase = find('fase', $value['id_fase'], 'fase');
                  //$rows_usr_has_fase = find2id('fase', $_GET['id'], $value['id_fase'], 'usuario', 'fase');

          
                
      ?>

      
        <div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div id="<?php echo $rows['id_usuario'];?>" class="small-box bg-aqua">
            <div class="inner">
              <h3>Fase <?php echo $rows_fase['numero_fase']; ?></h3>
               <input type="hidden" name="numero_fase" id="numero_fase" value="<?php echo $rows_fase['numero_fase'];?>" />
               <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $rows['id_usuario'];?>" />
               <input type="hidden" name="id_fase" id="id_fase" value="<?php echo $value['id_fase'];?>" />


              <h5><b><?php if($rows_fase['id_area']==12) echo "Teste de Software";
                        elseif($rows_fase['id_area']==22) echo "Manutenção de Software";
                        elseif($rows_fase['id_area']==32) echo "Processos de Software";?>

              </b></h5>
              <p><?php echo $rows_fase['nome_fase']?></p>
              <p>Nota: <?php echo $value['nota']?></p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
<?php 
            if($value['flag_fase'] == 2){ 
?>
            <a href="asyncPages/upload/<?php echo ($value['nome_arquivo'])?>" id="<?php echo ($value['id_fase'])?>" class="small-box-footer">
              Download Resposta <i class="fa fa-cloud-download"></i>
            </a>

<?php 
            }
            else if ($value['flag_fase'] != 2) { 
?>
            <a href="pages/asyncPages/upload/" class="small-box-footer" style="pointer-events: none;
   cursor: default;">
              Download Resposta <i class="fa fa-lock"></i>
</a>
<?php
           }
           if($value['flag_fase'] != 2) { 
?>  
           <a href="#" id="nota" name="<?php echo ($value['id_fase'])?>" class="small-box-footer resposta" style="pointer-events: none;
   cursor: default;">
              Atribuir Nota <i class="fa fa-lock"></i>
            </a>
<?php 
          }
          if($value['flag_fase'] == 2 ) { 
?>
           <a href="#" id="nota" name="<?php echo ($value['id_fase'])?>" class="small-box-footer resposta">
              Atribuir Nota <i class="fa fa-pencil-square-o"></i>
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
        ?>s
        <p><?php echo "Nenhuma fase cadastrada"; ?></p>
        <?php } ?>
             
      </div>



    </section>
    <!-- /.content -->


  </div>                 
          


  <!-- /.content-wrapper -->
<?php include(FOOTER_TEMPLATE); ?>

<script>

    $('#nota').click(function(){

          var numero_fase = $('#numero_fase').val();
          var id_fase = this.name;
          var id_usuario = this.parentNode.id;
          
          $('#modal-nota .modal-title').html('Nota - Fase '+numero_fase);
          $('#modal-nota #id_fase').attr('value', id_fase);
          $('#modal-nota #id_usuario').attr('value', id_usuario);
          $('#modal-nota #btn').hide();
          $("#modal-nota").modal("show");

        

    });

  </script>
