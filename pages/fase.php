 <?php 
    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');
    include ("../includes/modal.php");


     if(!empty($_GET['fase'])){
      $rows = find('fase', $_GET['fase'], 'fase');
      $rows_area = find('area', $rows['id_area'], 'area');
      $rows_fase_has_item = find('fase_has_item', $_GET['fase'], 'fase');
    }
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="<?php echo BASEURL?>index.php"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="<?php echo BASEURL?>pages/fases.php?area=<?php echo $rows['id_area']?>"><i class="fa fa-code"></i>Fases</a></li>
        <li class="active">Fase <?php echo $rows['numero_fase']?></li>
      </ol>
    </section>
    </br>

    <!-- Main content -->
    <section class="content">

     
      <section class="content">

      <!-- Utilizado para pegar a area no jquery -->
      <input type="hidden" id="areaID" value="<?php echo $rows['id_area'];?>" />
      <input type="hidden" id="numero_fase" value="<?php echo $rows['numero_fase'];?>" />
      <input type="hidden" id="id_fase" value="<?php echo $_GET['fase'];?>" />
       <?php


              
            if($rows != null){
        ?>
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fase <?php echo $rows['numero_fase'];?> - <?php echo $rows['nome_fase'];?> - <?php echo $rows_area['nome_area'];?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
              <div class="attachment-text">

                
                <p><b>Objetivo</b></p>
                <p><?php echo $rows['objetivo_fase']?></p>


                <p><b>Descrição da Fase</b></p>
                <p><?php echo $rows['descricao_fase']?></p>
                </br>

                <p><b>Itens Utilizados</b></p>
<?php 
                foreach ($rows_fase_has_item as $key => $item) {

                    $rows_itens = find('item', $item['id_item'], 'item');

?>
                <p><?php echo($item['quantidade_item'].' - '.$rows_itens['nome_item'].'.')?></p>
              
<?php 
                }
?>
                </br> 


                <p><b>Esquemático</b></p>
                <p>Utilize o esquemático abaixo para montar o circuito.</p>
                <div align="center" class="ampliar centralizar_acima">
                 <img  src="<?php echo $rows['esquematico_fase'] ?>" width="400" alt="Photo">
                </div>
               	</br>
            	</br>

                <p><b>Código</b></p>

                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                    <div class="box box-solid">
                      
                      <div class="box-body">
                            <pre style="font-weight: 600;">

<?php 

      if(!empty($rows['codigo_fase'])){
        $ponteiro = fopen ($rows['codigo_fase'],"r");

        while (!feof ($ponteiro)) {
          $linha = fgets($ponteiro, 4096);
          echo $linha;
        }

        fclose ($ponteiro);

     }
     else
        echo "Nenhum código no banco de dados";

?>
                                      </pre>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </form>
<?php } 

                $rowsUsrHasFase = find2id('usuario_has_fase', $_SESSION['id_usuario'], $_GET['fase'], 'usuario', 'fase');
                if($rowsUsrHasFase['flag_fase'] < 2){

?>
                
                <form>
                <div id="formInput1" class="box-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="inputFile">

                      <p class="help-block">Carregue as respostas em um arquivo compactado.</p>
                    </div>
                </div>
              </form>
<?php 
                }

?>

             

    </section>
    <!-- /.content -->

        <div align="center" class="timeline-footer">
<?php   if($rowsUsrHasFase['flag_fase'] == 2){ 
?>  
        <a href="fases.php?area=<?php echo ($rows['id_area'])?>" class="btn btn-primary btn-xs">Continuar</a>
<?php     } 
          else{

?>
          <a id="button_enviar" type="submit" class="btn btn-primary btn-xs">Enviar Respostas</a>
<?php 
          }
?>
        </div>


  </div>                 
          


  <!-- /.content-wrapper -->
<?php include(FOOTER_TEMPLATE); ?>

<script>
  	var flag = 0;
    $('#button_enviar').click(function(){


      if(($("#inputFile"))[0].files[0] == null ){
          $("#inputFile").css("border", "solid 2px red");
  
        alert("Faça upload das respostas para prosseguir");
      }
      else{


      	$(".casos_de_teste").css("display", "block");


      	$("#formInput1").css("display", "none");


      	$("#button_enviar").text("Continuar");

        
        if (flag == 0) {
            
          $.ajax({
            url: 'asyncPages/valida_fase.php',
            method: 'POST',
            data: {inputFile_name: ($("#inputFile"))[0].files[0].name, inputFile_size: ($("#inputFile"))[0].files[0].size, inputFile_type: ($("#inputFile"))[0].files[0].type, inputFile_tmp_name: ($("#inputFile"))[0].files[0].tmp_name, numero_fase: $("#numero_fase").val(), id_fase: $("#id_fase").val()},
            beforeSend: function(){
            },
            success: function(e){
            }
          });

          $("#modal-default").modal("show");

        }
      	if(flag == 1){


      	     $("#button_enviar").attr("href", "fases.php?area="+area);

        }

      	flag = 1;
      	
    }
    });

  </script>
