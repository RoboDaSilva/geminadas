<?php
@session_start('cidade_estado');

include_once 'admin/model/Empresa.php';

$model_empresa = new Model_Empresa();
$empresa = $model_empresa->find(1);
?>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-62651237-1', 'auto');
    ga('send', 'pageview');

</script>
<div class="topo-box-linhacima">
    <div class="container">
        <div class="clearfix">
            <div class="col-sm-4 col-md-3 col-lg-2 column hidden-xs">
                <div class="row">
                    <div class="row">
                        <span><i class="fa fa-phone-square"></i></span> <small> <?= $empresa['telefone'] ?></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 column hidden-xs">
                <div class="row">
                    <span><i class="fa fa-envelope"></i></span> <small>E-mail: <?= $empresa['email'] ?></small>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 column hidden-xs">
                <div class="row">
                    <span><i class="fa fa-lock"></i></span> <small>Site Seguro</small>
            </div>
            </div>
            <?
                $_SESSION['id_cidade'] = '6190';
                $_SESSION['cidade_estado'] = "Maringá - PR";
            ?>

            <!--<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 column cidade-estado">
                <div class="row">
                    <button class="btn btn-xs btn-default <?php echo ($_SESSION['cidade_estado']) ? '' : 'collapse' ?>" data-toggle="modal" data-target="#cidadeModal">
                        <i class="glyphicon glyphicon-refresh"></i>

                        <?php
                        $_SESSION['id_cidade'] = '6190';
                        $_SESSION['cidade_estado'] = "Maringá - PR";

                        if ($_SESSION['cidade_estado']) {
                            //echo $_SESSION['cidade_estado'];
                        }
                        ?>
                    </button>
                </div>
            </div>-->
<div class="row">
    <span class="pull-right social-networks">
                        <small>Vamos nos conectar?</small>
                        <?php if (!empty($empresa['facebook'])) { ?>
                            <a href="<?= $empresa['facebook'] ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
                        <?php } ?> 
                        <?php if (!empty($empresa['twitter'])) { ?>
                            <a href="<?= $empresa['twitter'] ?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
                        <?php } ?>
                        <?php if (!empty($empresa['youtube'])) { ?>
                            <a href="<?= $empresa['youtube'] ?>" target="_blank"><i class="fa fa-youtube-square"></i></a>
                        <?php } ?>
                        <?php if (!empty($empresa['instagram'])) { ?>
                            <a href="<?= $empresa['instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        <?php } ?>
                    </span>
            </div>
        </div>
    </div>
</div>

<div class="ornament-topo-listrado"></div>
<div class="container">
    <div class="row">
            <div class="navbar navbar-inverse bs-docs-nav" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
        <div class="col-md-2 column topo-box-logo">
            <a href="/">
                <img src="img/logo-geminadas.png">
            </a>
            </div>

      
                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/"><i class="fa fa-square"></i> Home</a>
                        </li>
                        <li>
                            <a href="quemsomos/"><i class="fa fa-square"></i> Nossa História</a>
                        </li>
                        <li>
                            <a href="servicos/"><i class="fa fa-square"></i> Atividades</a>
                        </li>
                        <li>
                            <a href="nossodiferencial/"><i class="fa fa-square"></i> Diferenciais </a>
                        </li>					
                        <li>
                            <a href="como-comprar-pagar/"><i class="fa fa-square"></i> Como Comprar</a>
                        </li>
                  
                        <li>
                            <a href="contato/"><i class="fa fa-square"></i> Contato</a>
                        </li>
                        
                        <li>
                            <a href="pedidos/"><i class="fa fa-square"></i> Meu Cadastro</a>
              
                        </li>
                    </ul>                      
                </nav>			
            </div>
        </div>
        <hr>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="cidadeModal" tabindex="-1" role="dialog" aria-labelledby="cidadeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="cidadeModalLabel">Escolha seu estado e sua cidade</h4>
            </div>
            <form id="form-cidade-estado-modal" method="POST" action="">
                <div class="modal-body">
                    <input type="hidden" name="action" value="gravar-cidade" />

                    <div class="form-group">
                        <label for="estados">Estado</label>
                        <select required="" id="estado" name="estado" class="form-control">
                            <option value="">Escolha o estado</option>
                            <option value="AC" >Acre</option>
                            <option value="AL" >Alagoas</option>
                            <option value="AP" >Amap&aacute;</option>
                            <option value="AM" >Amazonas</option>
                            <option value="BA" >Bahia</option>
                            <option value="CE" >Cear&aacute;</option>
                            <option value="DF" >Distrito Federal</option>
                            <option value="ES" >Esp&iacute;rito Santo</option>
                            <option value="GO" >Goi&aacute;s</option>
                            <option value="MA" >Maranh&atilde;o</option>
                            <option value="MT" >Mato Grosso</option>
                            <option value="MS" >Mato Grosso do Sul</option>
                            <option value="MG" >Minas Gerais</option>
                            <option value="PR" >Paran&aacute;</option>
                            <option value="PB" >Para&iacute;ba</option>
                            <option value="PA" >Par&aacute;</option>
                            <option value="PE" >Pernambuco</option>
                            <option value="PI" >Piau&iacute;</option>
                            <option value="RJ" >Rio de Janeiro</option>
                            <option value="RN" >Rio Grande do Norte</option>
                            <option value="RS" >Rio Grande do Sul</option>
                            <option value="RO" >Rondonia</option>
                            <option value="RR" >Roraima</option>
                            <option value="SC" >Santa Catarina</option>
                            <option value="SE" >Sergipe</option>
                            <option value="SP" >S&atilde;o Paulo</option>
                            <option value="TO" >Tocantins</option>
                        </select>
                    </div>

                    <div class="form-group cidades">
                        <label for="cidade">Cidade</label>
                        <select required="" id="cidade" name="cidade" class="form-control">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="text-center">
                        <p>
                            <small>
                                Os valores podem sofrer alterações de acordo com a sua localização.
                            </small>
                        </p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary btn-salvar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (empty($_SESSION['cidade_estado'])) { ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.telefone').mask('(99)99999-9999?');
        });

        var intervalo = setInterval(function () {
            initPage();
        }, 2000);

        function initPage() {
            jQuery('#cidadeModal').modal('show');
            clearInterval(intervalo);
        }
    </script>
<?php } ?>
