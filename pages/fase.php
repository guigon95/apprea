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

                <p><?php if($rows['id_area'] == 12) echo "Download: <a href='/pages/respostas/Casos-de-Teste_Exemplo.odt'>Exemplo Caso de Teste</a>"?></p>
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
                
                <form id="formUpload" enctype="multipart/form-data" action="asyncPages/valida_fase.php" method="POST" >
                <div id="formInput1" class="box-body">
                    <div class="form-group">

                      <!-- Utilizado para pegar a area no jquery -->
                      <input type="hidden" name="id_area" id="id_area" value="<?php echo $rows['id_area'];?>" />
                      <input type="hidden" name="numero_fase" id="numero_fase" value="<?php echo $rows['numero_fase'];?>" />
                      <input type="hidden" name="id_fase" id="idfase" value="<?php echo $rows['id_fase'];?>" />
                      <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario'];?>" />
                      <input type="hidden" name="resposta_fase" id="resposta_fase" value="<?php echo $rows['resposta_fase'];?>" />
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="inputFile" id="inputFile">
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
  
      }
      else{


      	$(".casos_de_teste").css("display", "block");


      	$("#formInput1").css("display", "none");


      	$("#button_enviar").text("Continuar");

        var area = $('#id_area').val();
        
        if (flag == 0) {
          
          var formData = new FormData($("#formUpload")[0]);

          $.ajax({
            url: 'asyncPages/valida_fase.php',
            type: 'POST',
            data: formData,
            beforeSend: function(){
            },
            success: function(e){
           
            },
            cache: false,
            contentType: false,
            processData: false
          });

          var numero_fase = $('#numero_fase').val();
          var resposta = $('#resposta_fase').val();
          var id_fase = $('#idfase').val();
          var id_area = $('#id_area').val();
         // $('#modal-resposta .modal-title').html('Resposta - Fase '+numero_fase);
         // $('#modal-resposta #embed').attr('src', '<?php echo(BASEURL)?>pages/respostas/'+resposta);
         // $('#modal-resposta #id_fase').attr('value', id_fase);
         // $('#modal-resposta #btn').hide();
         // $("#modal-resposta").modal("show");
         alert(numero_fase + " " + id_fase + " " + id_area);
        }
      	if(flag == 1){


      	     $("#button_enviar").attr("href", "fases.php?area="+area);

        }

      	flag = 1;
      	
    }
    });

  </script>
