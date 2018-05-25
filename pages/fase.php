 <?php 
    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');
    include ("../includes/modal.php");


     if(!empty($_GET['fase'])){
      $rows = find('fase', $_GET['fase'], 'fase');
      $rows_area = find('area', $rows['id_area'], 'area');
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
                <p>1 - Potenciômetro.</p>
                <p>4 - Resistores.</p>                
                <p>1 - LED Verde.</p>
                <p>2 - LEDs Amarelo.</p>
                <p>1 - LED Vermelho.</p>
                <p>1 - Protoboard.</p>
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
<?php } ?>
                
                
                <div id="formInput1" class="box-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile1">

                      <p class="help-block">Carregue o caso de Teste 1.</p>
                    </div>
                </div>

             
           
                <div id="formInput2" class="box-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile2">

                      <p class="help-block">Carregue o caso de Teste 2.</p>
                    </div>
                </div>

    </section>
    <!-- /.content -->

        <div align="center" class="timeline-footer">
          <a id="button_enviar" type="submit" name="submit" class="btn btn-primary btn-xs" data-toggle="modal" href="#modal-default">Enviar Respostas</a>
        </div>


  </div>                 
          


  <!-- /.content-wrapper -->
<?php include(FOOTER_TEMPLATE); ?>

<script>
  	var flag = 0;
    $('#button_enviar').click(function(){
    	$(".casos_de_teste").css("display", "block");


    	$("#formInput1").css("display", "none");

    	$("#formInput2").css("display", "none");

    	$("#button_enviar").text("Continuar");

      var area = $("#areaID").val();

      if (flag == 0) {
        alert("ffoi");
       var formData = {name:"ravi",age:"31"}; //Array 
 
          $.ajax({
              url : "../setarIntro.php",
              type: "POST",
              data : formData,
              success: function(data, textStatus, jqXHR)
              {
                  //data - response from server
                  alert("ffoi");
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert("erro");
              }
          });
      }
    	if(flag == 1){
    	     $("#button_enviar").attr("href", "fases.php?area="+area);

      }

    	flag = 1;
    	
    });
  
  </script>
