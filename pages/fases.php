<?php 
    
    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');
    include ("../includes/modal.php");
    include ("../includes/modalPatente.php");


   
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
  	  <input type="hidden" id="nome_usuario" value="<?php echo ($_SESSION['nome_usuario'])?>">
      <input type="hidden" id="id_patente" value="<?php echo ($_SESSION['id_patente'])?>">
      <input type="hidden" id="flag_patente" value="<?php echo ($_SESSION['flag_patente'])?>">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $rows_area['nome_area'];?>
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
               <input type="hidden" name="numero_fase" id="numero_fase" value="<?php echo $value['numero_fase'];?>" />
               <input type="hidden" name="resposta_fase" id="resposta_fase" value="<?php echo $value['resposta_fase'];?>" />

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
           <a href="#" id="<?php echo ($value['resposta_fase'])?>" class="small-box-footer resposta">
              Visualizar Resposta <i class="fa fa-eye"></i>
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

<script type="text/javascript">
    $(document).ready(function(){
     $(".resposta").click(function(){
     
                var numero_fase = $('#numero_fase').val();
                var resposta = $(this).attr('id');
                $('#modal-resposta .modal-title').html('Resposta Fase');
                $('#modal-resposta .pgtPorcentagem').hide();
                $('#modal-resposta #buttonContinuar').hide();
                $('#modal-resposta #embed').attr('src', '<?php echo(BASEURL)?>pages/respostas/'+resposta);
                $('#modal-resposta').modal('show'); 
            });

     
    var nome_usuario = $("#nome_usuario").val();
    var patente = $("#id_patente").val();
    var flag_patente = $("#flag_patente").val();

    if(patente == 2)
      patente = "Estagiário";
    else if(patente == 12)
      patente = "Engenheiro de Software Júnior";
    else if (patente == 22)
      patente = "Engenheiro de Software Pleno";
    else if (patente = 32)
      patente = "Engenheiro de Software Sênior";

    
        $('#modal-patente #label_nome').text(nome_usuario);
        $('#modal-patente #label_patente').text(patente);
        
        if(flag_patente == 1){
             $.ajax({ url: 'asyncPages/flag_patente.php' });
            $('#modal-patente').modal('show'); 
        }
   

    });
</script>
</body>
</html>
