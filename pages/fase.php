 <?php 

    require_once ('../config.php');  
    include (HEADER_TEMPLATE);
    include (SIDEBAR_TEMPLATE);
    require_once(ABSPATH.'functions.php');


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
                <p>1 - Arduino.</p>
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
                 <img  src="img/esquematico_fase1.png" width="400" alt="Photo">
                </div>
               	</br>
            	</br>

                <p><b>Código</b></p>

                <div class="row" style="margin-top: 10px;">
                  <div class="col-md-12">
                    <div class="box box-solid">
                      
                      <div class="box-body">
                            <pre style="font-weight: 600;">
#define LED1 3
#define LED2 4
#define LED3 5
#define LED4 6
#define POT A5

//Variaveis
int valorPot = 0;

void setup() {
  // put your setup code here, to run once:
  pinMode(POT, INPUT);
  pinMode(LED1, OUTPUT);
  pinMode(LED2, OUTPUT);
  pinMode(LED3, OUTPUT);
  pinMode(LED4, OUTPUT);  
}

void loop() {  
  //Lê valor do potenciometro
  valorPot = analogRead(POT);

  //Controla LED 1
  if(valorPot > 255){
    digitalWrite(LED1, HIGH);
  } else{
    digitalWrite(LED2, LOW);
  }

  //Controla LED 2
  if(valorPot > 512){
    digitalWrite(LED3, HIGH);
  } else{
    digitalWrite(LED4, LOW);
  }

  //Controla LED 3
  if(valorPot > 768){
    digitalWrite(LED4, HIGH);
  } else{
    digitalWrite(LED3, LOW);
  }

  //Controla LED 4
  if(valorPot > 1000){
    digitalWrite(LED2, HIGH);
  } else{
    digitalWrite(LED1, LOW);
  }

            }
                                      </pre>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
<?php } ?>
                </br>

                <p><b>Casos de Teste</b></p>
                <div class="casos_de_teste">
                <p>O Teste 1 revela o seguinte defeito: Ao girar o potenciômetro no sentido horário até o fim, um dos LEDs não acende.</dd>
                <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <tr>
                <th colspan="2" align="center">Caso de Teste</th>
              </tr>
              <tr>
                <td><dt>ID</dt></td>
                <td>1</td>
              </tr>
              <tr>
                <td><dt>Objetivo</dt></td>
                <td>Verificar funcionamento dos LEDs</td>
              </tr>
              <tr>
                <td><dt>Ator</dt></td>
                <td>Aluno de Engenharia de Software</td>
              </tr>
              <tr>
                <td><dt>Pré-condições</dt></td>
                <td>Potenciômetro girado no sentido anti-horário até o fim</td>
              </tr>
              <tr>
                <td><dt>Procedimentos (Entradas e saídas)</td>
                <td>1 – Girar o potenciômetro no sentido horário até o final
<p>2 – Os LEDs devem acender um a um até que todos estejam acesos representando “volume máximo”</p>
</td>
              </tr>
              <tr>
                <td><dt>Pós-condições</dt></td>
                <td>Todos os LEDs acesos</td>
              </tr>
            </table>
        	</div>

    	</div>

            <form id="invisivel" role="form">
                <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">

                      <p class="help-block">Carregue o caso de Teste 1.</p>
                    </div>
                </div>
            </form>

            <div class="casos_de_teste">
            </br></br>
                <p>O Teste 2 revela o seguinte defeito: ao girar o potenciômetro, a sequência de acendimento e apagamento dos LEDs não é obedecida. Alguns LEDs também acendem com brilho mais baixo.</p>
                <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <tr>
                <th colspan="2" align="center">Caso de Teste</th>
              </tr>
              <tr>
                <td><dt>ID</dt></td>
                <td>2</td>
              </tr>
              <tr>
                <td><dt>Objetivo</dt></td>
                <td>Verificar se os LEDs acendem na ordem correta</td>
              </tr>
              <tr>
                <td><dt>Ator</dt></td>
                <td>Aluno de Engenharia de Software</td>
              </tr>
              <tr>
                <td><dt>Pré-condições</dt></td>
                <td>Potenciômetro girado no sentido anti-horário até o fim</td>
              </tr>
              <tr>
                <td><dt>Procedimentos (Entradas e saídas)</td>
                <td><p>1 – Girar o potenciômetro no sentido horário lentamente</p>
                    <p>2 – Os LEDs devem acender na sequência: verde, amarelo, amarelo e vermelho</p>
                    <p>3 – Girar o potenciômetro no sentido anti-horário lentamente</p>
                    <p>4 – Os LEDs devem apagar na sequência: vermelho, amarelo, amarelo e verde</p></td>
              </tr>
              <tr>
                <td><dt>Pós-condições</dt></td>
                <td>Todos os LEDs apagados</td>
              </tr>
            </table>
          </div>
        </div>

            <form id="formInput2" role="form">
                <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">

                      <p class="help-block">Carregue o caso de Teste 2.</p>
                    </div>
                </div>
            </form>

            </div>
              </div>
              </form>




                 
     

    </section>
    <!-- /.content -->

        <div align="center" class="timeline-footer">
            <a href="#button_enviar" id="button_enviar" class="btn btn-primary btn-xs">Enviar Respostas</a>
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
});

  	var flag = 0;
    $('#button_enviar').click(function(){
    	$(".casos_de_teste").css("display", "block");
    	$("#formInput1").css("display", "none");

    	$("#formInput2").css("display", "none");

    	$("#button_enviar").text("Continuar");

    	if(flag == 1)
    	$("#button_enviar").attr("href", "fases.html");

    	flag = 1;
    	
    });

    $("#button_continuar").click(function(){
    	alert("foi");
    });
  


</script>
</body>
</html>
