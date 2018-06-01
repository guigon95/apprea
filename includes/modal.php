        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Casos de Testes - Resopsta</h4>
              </div>
              <div class="modal-body">
                <div class="casos_de_teste">
                <p>O Teste 1 revela o seguinte defeito: Ao girar o potenciômetro no sentido horário até o fim, um dos LEDs não acende.</p>
                <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
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
                <td><dt>Procedimentos (Entradas e saídas)</dt></td>
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

          <div class="casos_de_teste">
            </br>                <p>O Teste 2 revela o seguinte defeito: ao girar o potenciômetro, a sequência de acendimento e apagamento dos LEDs não é obedecida. Alguns LEDs também acendem com brilho mais baixo.</p>
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
                <td><dt>Procedimentos (Entradas e saídas)</dt></td>
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

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Continuar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->