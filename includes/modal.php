
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <div class="modal fade" id="modal-resposta">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title"></h4>

                    <embed  id="embed" src="" frameborder="0" width="100%" height="400px"> 

              </div>
              <form id="formPorcentagem" method="POST" >
                <div class="pgtPorcentagem" align="center">
                  <p>Qual a sua porcentagem de acerto na questão?</p>
                  <input name="porcentagem" id="porcentagem" placeholder="50%">
                  <input type="hidden" name="id_fase" id="id_fase" value="" />
                </div>
              </form>
              <div class="modal-footer">
                <button id="buttonContinuar" class="btn btn-primary">Continuar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <script type="text/javascript">
          
          $(document).ready(function(){
            $("#buttonContinuar").click(function(){
                
              if($('#porcentagem').val()!= ""){
                var formData = new FormData($("#formPorcentagem")[0]);

                 $.ajax({
                    url: 'asyncPages/valida_porcentagem.php',
                    type: 'POST',
                    data: formData,
                    beforeSend: function(){
                    },
                    success: function(e){
                       $('#modal-resposta').modal('hide');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                  });
              }
              else{
                $('#porcentagem').css('border-color', 'red');

              }


             });
          });
     
        </script>
