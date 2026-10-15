<?php
require 'init.php';

session_start();
$id_venda = $_SESSION['venda_id'];

include_once 'admin/model/TamanhoTerreno.php';
include_once 'admin/model/Venda.php';
include_once 'admin/model/Cliente.php';
require_once 'admin/model/Venda_Item_Fachada.php';
include_once 'admin/model/Fachada.php';
include_once 'admin/model/Planta.php';
include_once 'admin/model/CidadeValor.php';
require_once 'admin/model/Opcionais.php';
require_once 'admin/model/Venda_Item_Opcional.php';

$model_venda = new Model_Venda();
$venda = $model_venda->search(null, array('id = ?' => $id_venda));

$model_cliente = new Model_Cliente();
$cliente = $model_cliente->search(null, array('id = ?' => $venda[0]['clientes_id']));

$model_venda_item_fachada = new Model_Venda_Item_Fachada();
$venda_item_fachada = $model_venda_item_fachada->search(null, array('vendas_id = ?' => $id_venda));

$model_fachada = new Model_Fachada();
$fachada = $model_fachada->search(null, array('id = ?' => $venda_item_fachada[0]['fachadas_id']));

$model_planta = new Model_Planta();
$planta = $model_planta->search(null, array('id = ?' => $fachada[0]['plantas_id']));

$model_venda_item_opcional = new Model_Venda_Item_Opcional();
$venda_item_opcional = $model_venda_item_opcional->search(null, array('vendas_id = ?' => $id_venda));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
    <base href="/">
        <meta charset="utf-8">
        <title>Geminadas.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="img/favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="fonts/stylesheet.css" rel="stylesheet" type="text/css" charset="utf-8" />
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">

        <style type="text/css">
            .destaque-footer { display: none; }
        </style>
     
    </head>
    <body>
       
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 949080691;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "cH38CNqplnUQ86THxAM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/949080691/?label=cH38CNqplnUQ86THxAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
        <?php include 'header.php'; ?>

        <div class="container">
            <div class="row clearfix">
                <div align=”center”>
                        <h1>Comprar Projeto </h1> 
                        <h1>Projeto Moderno 60,5m² Com Suíte</h1>   
                                <div class="fluid">
                               
    <div class="container">
            <div class="row clearfix">
                                <div class="video-box"></div>
                                <iframe width="400" height="300" src="https://www.youtube.com/embed/BR0UIzOO8F4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
             
                                     <h1>Descrição do Projeto:</h1>
                                     <br>
                                        <p align=”center”><h4>Tamanho Mínimo do Terreno: 7m x 20m</h4>
                                        <p align=”center”><h4>Sala e Cozinha integrada</h4>
                                        <p align=”center”> <h4>Banheiro social</h4>
                                        <p align=”center”><h4>Uma suíte</h4>
                                        <p align=”center”><h4>Um quarto</h4>
                                        <p align=”center”> <h4> Lavanderia coberta</h4>
                                        <p align=”center”><h4> Garagem descobera</h4>
                
                </div>
            </div>
     </div>
 
                                                     
    <div class="post-content">
	<img src="https://www.geminadas.com/landing/planta4001280.jpg" />
</div> 
                                                        
    <div class="post-content">
	<img src="https://www.geminadas.com/landing/comprar.jpg" />
</div>
     <div class="post-content">
	<img src="https://www.geminadas.com/landing/fachada400300.jpg" />
</div>
                                                            </span>
                                                            </div>
                                                                
                                                                        <div class="container">
            <div class="row clearfix">
                <div class="fluid">
                                                  <h4>
                                  
                                            <br>
            
                        
                                <div class="col-md-6">
                                    <div class="container">
            <div class="row clearfix">
                <div class="col-md-6 column internas-box">
                    
						<br>    Alguma observação? escreva no campo abaixo! <br>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="well-sm">
                                <form id="form-contato" method="POST" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nome">Nome Completo</label>
                                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Completo" required="required" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                                    </span>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required="required" />
                                                </div>
                                            </div>
                                            
                                        
                                        <div class="fluid">
                                            <div class="form-group">
                                                <label for="mensagem">Mensagem</label>
                                                <textarea name="mensagem" id="mensagem" class="form-control" rows="9" cols="250" required="required" placeholder="Mensagem"></textarea>
                                            </div>

                                            <div class="g-recaptcha pull-right" data-sitekey="6LfcWigUAAAAALmuRvwhkZqsvETTVYY0x81poJZf"></div><br>
                                        </div>
                                        

                                        <div class="col-md-12">

                                            <button type="submit" class="btn btn-labeled btn-warning pull-right">
                                                <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Enviar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                              
                             
                          
                                            <h2>COMPRAR PROJETO</h2>
                                            <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<input type="hidden" name="code" value="1A73AC6E1C1C29F2243A1FB0951FECD6" />
<input type="hidden" name="iot" value="button" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-comprar-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
                                         
                                    <small>
                                        Ao clicar em <b>comprar com Pagseguro</b> você será redirecionado para os servidores seguros do PagSeguro.<br />
                                        Nosso sistema NÃO mantém registro dos seus dados de pagamento.<br />
                                    </small>
                                </div>

                                <div class="clearfix"></div>

                                            
                                             <!-- Event snippet for Checkout conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-949080691/LpyNCN7ZoJEBEPOkx8QD',
      'transaction_id': '',
      'event_callback': callback
  });
  return false;
}
</script>
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->

        <?php include 'footer.php'; ?>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>	
        <script type="text/javascript" src="js/holder.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/general.js"></script>
        <script type="text/javascript" src="js/contato_footer.js"></script>
        <script type="text/javascript" src="js/cidade_estado.js"></script>
        <script type="text/javascript" src="js/galleria-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.zoom.min.js"></script>
    </body>
</html>
