 <?php 
    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');
    include ("../../../includes/modal.php");


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
<embed src="http://localhost/apprea/pages/asyncPages/respostas/LE1.pdf"
                               frameborder="0" width="100%" height="400px">
        </section> 

    </section>
    <!-- /.content -->

        <div align="center" class="timeline-footer">

        </div>


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
            data: {inputFile_name: ($("#inputFile"))[0].files[0].name, inputFile_size: ($("#inputFile"))[0].files[0].size, inputFile_type: ($("#inputFile"))[0].files[0].type, numero_fase: $("#numero_fase").val(), id_fase: $("#id_fase").val()},
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
