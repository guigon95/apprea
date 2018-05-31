<?php
  require_once ('../config.php');  
  include (HEADER_TEMPLATE);
  include (SIDEBAR_TEMPLATE);
  require_once(ABSPATH.'functions.php');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Introdução ao Arduino
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.html"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Introdução ao arduino</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box box-solid">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .paneol class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Arduino
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                        <p>O arduino é uma plataforma de prototipagem eletrônica <i>open-source</i> criada em 2005, que baseia-se em hardware e software flexíveis e de fácil uso, tornando-se acessível para novatos e profissionais. O arduino é capaz de sentir o estado do ambiente através de sensores e interagir com o mesmo por meio de motores e outros atuadores.</p>
                        <p>Para o desenvolvimento na plataforma são necessários dois componentes: Hardware e software.</p>

                        <h4><b>Hardware:</b></h4>
                        <p>Este, nada mais é que um microcontrolador com suporte de entrada e saída embutido. Existem diversas placas de arduino, porém nesta introdução iremos abordar a placa Arduino UNO.</p>

                        <center><p class="ampliar"><img src="../dist/img/arduinoUno.png"></p></center>

                        <h5><b>Especificações:</b></h5>

                        <p><b>-14 Pinos de entrada e saída digital (pinos 0-13):</b></p>
                        <p>São utilizados como entradas e saídas digitais de acordo com o projeto e definição do sketch.</p>

                        <p><b>-6 Pinos de entradas analógicas (pinos A0 - A5):</b></p>
                        <p>São utilizados para receber valores analógicos. O valor recebido deve estar na faixa de 0 a 5V que será posteriormente convertido para valores entre 0 e 1023.</p>

                        <p><b>-6 Pinos de saída analógicas (pinos 3, 5, 6, 9, 10 e 11):</b></p>
                        <p>Estes podem ser programados para serem utilizados como saídas analógicas, utilizando modulação PWM.</p>


                        <h4><b>Software:</b></h4>

                      
                        <center><div class="ampliar">
                            <img src="<?php echo BASEURL ?>dist/img/arduinoide2.PNG" alt="IDE Arduino" width="400">
                          </div>
                        </center>
                        
                      

                        <p>O software é uma IDE onde será implementado o código(sktech), utilizando uma linguagem de programação padrão, modelada a partir da linguagem Wiring, que será posteriormente carregado para a placa arduino, através de uma comunicação serial. No processo de upload, o código escrito é traduzido para a linguagem C e enviado para o compilador avr-gcc, que traduz os comandos para uma linguagem de baixo nível compreensível pelo microcontrolador.</p>

                        <p>Para realizar o download da IDE acesse: <a href="https://www.arduino.cc/en/main/software" target="_blank">Download</a></p>
                        <p>Video aula de instalação: <a href="https://github.com/andreendo/umlino-rea/blob/master/V%C3%ADdeo%20Aulas%20de%20Instala%C3%A7%C3%A3o/Instala%C3%A7%C3%A3o%20Arduino%201.0.6%20.mp4" target="_blank">Video aula</a></p>
                        <p>Para mais informações: <a href="https://www.arduino.cc/" target="_blank" alt="https://www.arduino.cc/">Arduino Oficial</a></p>
                        
                    </div>
                  </div>
                </div>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Projeto Introdutório
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                
                <div class="box-body">
                	<p>O projeto introdutório consiste em dois pushbuttons que acendem e apagam um LED. O botão conectado ao pino 9 liga o LED e o botão conectado ao pino 8 desliga-o.</p>
                      
                    <p><b>Esquemático</b></p>
                    <p>Utilize o esquemático abaixo para a montagem do circuito</p>
                    <div align="center" class="ampliar">
                    	<img src="img/esquematico_introducao.png" width="400" alt="Esquemático"> 
                    </div>

                    <div>
                    	<p><b>Implementação</b></p>
                    	<p>Para criação do sketch, abra a IDE do arduino e copie o código abaixo. Em seguida, conecte o cabo no arduino e no computador e selecione o botão carregar, localizado na parte superior esquerda da IDE, para carregar o sketch na placa.</p>

                    </div>
                   
                   <div id="codigo_intro">
	       			<p><b>Código</b></p>
	                <div class="row" style="margin-top: 10px;">
	                  <div class="col-md-12">
	                    <div class="box box-solid">
	                      
	                      <div class="box-body">
	                            <pre style="font-weight: 600;">

int led = 10; // declaração das variáveis e da porta aonde se encontram
int BotaoDesliga = 8;
int BotaoLiga = 9;

int EstadoBotao1 = 0; // essa função se limita a 0 = sem corrente e 1 = com corrente
int EstadoBotao2 = 0;

void setup(){ //inicialização
pinMode(led, OUTPUT); // pino com led será saída (OUTPUT)
pinMode(BotaoDesliga, INPUT); // pino com botão será entrada (INPUT)
pinMode(BotaoLiga, INPUT);
}

void loop(){ // laço de repetição
EstadoBotao1 = digitalRead(BotaoDesliga); // esta função lê o que está acontecendo com o botão e atribui a uma variável
EstadoBotao2 = digitalRead(BotaoLiga);

// HIGH = com corrente = aceso   = 1
// LOW  = sem corrente = apagado = 0

if (EstadoBotao1 == HIGH){ // se o botão estiver pressionado será HIGH, caso contrário LOW
    digitalWrite(led, HIGH); // usa-se essa função para enviar o comando. HIGH = aceso
  } 
    
if (EstadoBotao2 == HIGH){ 
    digitalWrite(led, LOW);// LOW = apagado
  } 

}
                                      </pre>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                               
                                <div align="center" class="timeline-footer">
                                    <a id="button_continuar" type="submit" name="submit" class="btn btn-primary btn-xs">Continuar</a>
                                </div>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->


          </div>

     

    </section>
    <!-- /.content -->

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
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  

  $('#button_continuar').click(function(){


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
  });

})
  
</script>


</body>
</html>
