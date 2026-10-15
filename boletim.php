<?php
require_once 'init.php';

include_once 'admin/model/TamanhoTerreno.php';
include_once 'admin/model/PlantaTipo.php';
include_once 'admin/model/Slide.php';
include_once 'admin/model/Video.php';

$model_tamanho_terreno = new Model_TamanhoTerreno();
$tamanhos_terrenos = $model_tamanho_terreno->fetchAll();

$model_slide = new Model_Slide();
//$slide = $model_slide->fetchAll();
$slide = $model_slide->search(null, null, null, 'RAND()');


$model_video = new Model_Video();
$video = $model_video->fetchAll();

$model_planta_tipo = new Model_PlantaTipo();
$plantas_tipos = $model_planta_tipo->fetchAll();

$isiPhone = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone');
$isAndroid = (bool) strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'android');


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <base href="/">
        <meta charset="utf-8">
        <title>Geminadas.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="skype_toolbar" content="skype_toolbar_parser_compatible" /> 
        <link rel="shortcut icon" href="img/favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="fonts/stylesheet.css" rel="stylesheet" type="text/css" charset="utf-8" />
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
        <meta name="p:domain_verify" content="7240d8cc29f3496793a34a6166f61485"/>
        <script type="text/javascript">
            function reEnable() {
                return true;
            }

            //if IE4+
            document.onselectstart = new Function("return false");
            document.oncontextmenu = new Function("return false");
            //if NS6
            if (window.sidebar) {
                document.onmousedown = disableselect;
                document.onclick = reEnable;
            }


        </script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KQXP7XG');</script>
<!-- End Google Tag Manager -->
    </head>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <a href="https://api.whatsapp.com/send?l=pt&amp;phone=5544991510860"><img src="https://i.imgur.com/XMsxHpu.png" style="height:65px; position:fixed; bottom: 90px; right: 20px; z-index:20;" data-selector="img"></a>
    <body ondragstart='return false'>
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXP7XG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <script type="text/javascript">
  /* <![CDATA[ */
  goog_snippet_vars = function() {
    var w = window;
    w.google_conversion_id = 949080691;
    w.google_conversion_label = "cH38CNqplnUQ86THxAM";
    w.google_remarketing_only = false;
  }
  // DO NOT CHANGE THE CODE BELOW.
  goog_report_conversion = function(url) {
    goog_snippet_vars();
    window.google_conversion_format = "3";
    var opt = new Object();
    opt.onload_callback = function() {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  }
  var conv_handler = window['google_trackConversion'];
  if (typeof(conv_handler) == 'function') {
    conv_handler(opt);
  }
}
/* ]]> */

</script>
<script type="text/javascript"
  src="//www.googleadservices.com/pagead/conversion_async.js">
</script>
        <!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/', 'ventanacompartir', "toolbar=0, status=0, width=650, height=450");">Compartilhar no Facebook</a>-->

        <!--<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/' + id + '','ventanacompartir', 'toolbar=0, status=0, width=650, height=300');">Compartilhar</a>-->
        <!--        <a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=http://geminadas.com/fachada/'+ id,'ventanacompartir', 'toolbar=0, status=0, width=650, height=300');">Compartilhar</a>-->


        <div class="f-loading">
            <img class="f-loading-image" src="img/ajax-loader.gif" alt="Loading..." />
        </div>
        <?php include 'header.php'; ?>

<br><br>
</div>
<div class="container">
    <div class="row">
        <div class="col-md12" style="text-align: center;">
            
             <!--Paste this code on the bottom of your page-->
            <script type="text/javascript" id="script_3e5e1uTleh5iyTJilVe9373d3d6">
            var _egoiLoaderMulti = _egoiLoaderMulti || [];
            var _egoiLoaderValues = [];
            _egoiLoaderValues.push(["_setForm", "3e5e1uTleh5iyTJilVe9373d3d6"]);
            _egoiLoaderValues.push(["_setResource", "5885b76011243c6ab783ca2778219c50"]);
            _egoiLoaderValues.push(["_setUrl", "https://26.e-goi.com/"]);
            _egoiLoaderValues.push(["_setType", "normal"]);
            _egoiLoaderValues.push(["_setWidth", "400"]);
            _egoiLoaderValues.push(["_setHeight", "545"]);
             _egoiLoaderMulti.push(_egoiLoaderValues);
            (function() {
            var egoi = document.createElement("script"); egoi.type = "text/javascript"; egoi.async = true;
            egoi.src = "https://26.e-goi.com/include/javascript/egoi.js";
            var e = document.getElementById("script_3e5e1uTleh5iyTJilVe9373d3d6"); e.parentNode.insertBefore(egoi, e);
            })();
            </script>
            <!--Paste this code where you want the form to appear-->
            <div id="a3e5e1uTleh5iyTJilVe9373d3d6"></div>
 
 </div>      
 <div class="container">
    <div class="row">
        <div class="col-md12" style="text-align: center;">
            <h1>Plantas em Destaque</h1>
        </div>

        <?php
            include_once 'admin/model/Planta.php';
            $model_planta = new Model_Planta();
            $plantas = $model_planta->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
        ?>
         <?php for ($i = 0; $i < count($plantas); $i++) { ?>
                <?php if (!empty($plantas[$i]['foto'])) { ?>
                <div class="col-md-3 well img-thumbnail">            
           
                    <div class="item <?php echo ($i == 0) ? "active" : "" ?>">
                        <a href="planta/<?php echo $plantas[$i]['id']; ?>">
                            <figure>
                                <img src="uploads/plantas/<?php echo $plantas[$i]['foto']; ?>" class="img-responsive" style="width: 100%;">
                            </figure>
                        </a>
                    </div>
                
                </div>
            <?php } ?>
        <?php } ?>

    </div>
	</div>
<div class="container">
    <div class="row">
        <div class="col-md12" style="text-align: center;">
            <h1>Fachadas em Destaque</h1>
        </div>

        <?php
            include_once 'admin/model/Fachada.php';
            $model_fachada = new Model_Fachada();
            $fachadas = $model_fachada->search(null, array('destaque = ?' => 1), null, null, 'RAND()');
        ?>
         <?php for ($i = 0; $i < count($fachadas); $i++) { ?>
                <?php if (!empty($fachadas[$i]['foto'])) { ?>
                <div class="col-md-3 well img-thumbnail">            
           
                    <div class="item <?php echo ($i == 0) ? "active" : "" ?>">
                        <a href="fachada/<?php echo $fachadas[$i]['id']; ?>">
                            <figure>
                                <img src="uploads/fachadas/<?php echo $fachadas[$i]['foto']; ?>" class="img-responsive" style="width: 100%;">
                            </figure>
                        </a>
                    </div>
                
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
</div>
  </div>   
<br><br>

<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
<script type="text/javascript" src="js/holder.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/projeto-exclusivo.js"></script>
<script type="text/javascript" src="js/alterar-projeto-existente.js"></script>
<script type="text/javascript" src="js/contato_footer.js"></script>
<script type="text/javascript" src="js/cidade_estado.js"></script>
<script type="text/javascript" src="js/galleria-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.zoom.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"/></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"/></script>

<script type="text/javascript">
                                function loadMask() {
                                    alert('ok');
                                    document.getElementsByClassName('telefone').mask('(99)99999-9999?');
                                    document.getElementbyId('cep').mask('99999-999');
                                }

                                jQuery(document).ready(function () {
                                    jQuery('.telefone').mask('(99)99999-9999?');
                                    jQuery('#cep').mask('99999-999');
                                    // Initialize Galleria
                                    Galleria.loadTheme('js/galleria.classic.js');
                                    Galleria.configure({
                                        imageCrop: false,
                                        transition: 'fade'
                                    });
// Efeito Zoom
                                    Galleria.on('image', function (e) {
                                        jQuery(e.imageTarget).parent().zoom();
                                    });
                                });

                                function autoPlayYouTubeModal(){
                                  var trigger = jQuery("body").find('[data-toggle="modal"]');
                                  trigger.click(function() {
                                    var theModal = jQuery(this).data( "target" ),
                                    videoSRC = jQuery(this).attr( "data-theVideo" ), 
                                    videoSRCauto = videoSRC+"?autoplay=1&output=embed" ;
                                    jQuery(theModal+' iframe').attr('src', videoSRCauto);
                                    jQuery(theModal+' button.close').click(function () {
                                        jQuery(theModal+' iframe').attr('src', videoSRC);
                                    });   
                                  });
                                }

                                jQuery(document).ready(function(){
                                  autoPlayYouTubeModal();
                                });
</script>
</body>
</html>
