
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <div class="modal fade" id="modal-nota">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title"></h4> 

              </div>
              <form id="formNota" method="POST" >
                <div class="pgtNota" align="center">
                  <p>Nota:</p>
                  <input name="id_nota" id="id_nota" placeholder="10.00">
                  <input type="hidden" name="id_fase" id="id_fase" value="">
                  <input type="hidden" name="id_usuario" id="id_usuario" value="">
                </div>
              </form>
              <div class="modal-footer">
                <button id="buttonContinuar" class="btn btn-primary">Continuar</button>
                <button id="btn" class="btn btn-primary">Continuar</button>
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
                
              if($('#id_nota').val()!= ""){
                var formData = new FormData($("#formNota")[0]);

                 $.ajax({
                    url: 'asyncPages/valida_nota.php',
                    type: 'POST',
                    data: formData,
                    beforeSend: function(){
                    },
                    success: function(e){
                       location.reload();
                       $('#modal-nota').modal('hide');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                  });
              }
              else{
                $('#id_nota').css('border-color', 'red');

              }

             });

            $("#btn").click(function(){
                  $('#modal-nota').modal('hide');  
            });
          });
     
        </script>
