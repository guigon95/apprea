<?php
  
  require_once ('../config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once(ABSPATH.'functions.php');

  
      if(isset($_GET['area']))
      $id_area = $_GET['area'];


      $rows = find('teste', $id_area, 'area');
      
      $rowArea = find('usuario_has_area', $id_area, 'area');


  

?>

<style type="text/css">
  
  .classNormal{
    color: blue;
  }

</style>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="<?php echo BASEURL?>index.php" ?>"><i class="fa fa-dashboard"></i> Início</a></li>
        <li><a href="<?php echo BASEURL?>pages/introducao_area.php?area=<?php echo $id_area ?>"><i class="fa fa-code"></i>Introdução</a></li>
        <li class="active">Fases></li>
      </ol>
    </section>
    </br>

    <!-- Main content -->
    <section class="content">

     


            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Testes </h3>


              <input type="hidden" name="flag_introducao" id="flag_introducao" value="<?php echo $rowArea[0]['flag_introducao'];?>" />
              <input type="hidden" name="id_area" id="id_area" value="<?php echo $id_area?>" />
              <input type="hidden" name="flag_intro_arduino" id="flag_intro_arduino" value="<?php echo $_GET['flag_intro_arduino']?>" />



            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
<?php 
          if($rows!=null){

              $contRadio = 0;
              foreach ($rows as $row => $value) {

                        $alternativas = explode(";", $value['alternativa_teste']);
?>
              <input type="hidden" id="resposta_teste<?php echo($contRadio)?>" value="<?php echo $value['resposta_teste']?>" />
              <div>
              <?php echo($value['descricao_teste']); ?>
              </div>
                <!-- radio -->
                <div class="form-group">
<?php
                
                
                foreach ($alternativas as $alternativasValue){


?>
                  <div class="radio">
                    <div class="classe<?php echo($contRadio) ?>">
                      <label name="<?php echo($alternativasValue) ?>">
                       <input type="radio" name="radioGroup<?php echo($contRadio)?>" value="<?php echo($alternativasValue) ?>">
                        <?php echo($alternativasValue) ?>
                      </label>
                    </div>
                  </div>
                  <?php } ?>
                  

                </div>
              </form>
           

<?php
             $contRadio++;
                  }

        }
        else{
          echo("Nenhuma alternativa cadastrada");
        }
?>
          
           </div>    
    </section>
    <!-- /.content -->
        <input type="hidden" name="iontRadio" id="contRadio" value="<?php echo $contRadio?>" />
        <div align="center" class="timeline-footer">
            <button id="button_continuar" class="btn btn-primary btn-xs">Continuar</button>
        </div>
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
   
    $('#button_continuar').click(function(){



    var flag_introducao = $('#flag_introducao').val();
    var flag_intro_arduino = $('#flag_intro_arduino').val();
    var id_area = $('#id_area').val();
    var contRadio = $('#contRadio').val();

    var i = 0;
    for(i = 0; i<contRadio;i++){
        if(!$("input:radio[name='radioGroup"+i+"']:checked").val()){
          alert("Selecione todas as alternativas");
          return;
        }
        else if($("input:radio[name='radioGroup"+i+"']:checked").val() == $('#resposta_teste'+i).val()){
          $("label[name='"+$('#resposta_teste'+i).val()+"']").css("color", "green").css("font-weight", "bold");
        }
        else if($("input:radio[name='radioGroup"+i+"']:checked").val() !=  $('#resposta_teste'+i).val()){
          $("label[name='"+$("input:radio[name='radioGroup"+i+"']:checked").val()+"']").css("color", "red").css("font-weight", "bold");
        }

    }

    
    for(i = 0; i<contRadio;i++){

        if($("input:radio[name='radioGroup"+i+"']:checked").val() != $('#resposta_teste'+i).val()){
          alert("Todas as alternativas devem estar corretas");
          return; 
        }
        else if(i+1 == contRadio){

          if(flag_introducao == 0 && flag_intro_arduino == 0){
               $.ajax({
                      url: 'asyncPages/valida_testes.php',
                      method: 'POST',
                      data: {valida_testes: 1},
                      beforeSend: function(){
                      },
                      success: function(e){
                        document.location = "fases.php?area="+id_area;
                      }
                    });
              }
              else if(flag_intro_arduino == 1){

                $.ajax({
                    url: 'asyncPages/flag_intro_arduino.php',
                    method: 'POST',
                    data: {valor: 1},
                    beforeSend: function(){
                     // alert('enviando');
                    },
                    success: function(e){
                     // alert('funcionou');
                     $(location).attr('href', '../index.php');

                    }
                  });

              }
              else{
                document.location = "fases.php?area="+id_area;
              }

          }
    }

      
    })

    $('input:radio').click(function(){
      
       $(this).parents("").find(".classe"+$(this).attr('name').charAt($(this).attr('name').length-1)).children().css("color", "").css("font-weight", "normal");

    })
</script>
</body>
</html>