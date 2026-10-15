<?php
require_once 'init.php';
$page = 'depoimentos';

$whatsapp_number = "5544988440055";
$whatsapp_url = "https://wa.me/" . $whatsapp_number . "?text=" . urlencode("Olá! Vi os depoimentos no site Geminadas.com e gostaria de solicitar um projeto.");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depoimentos e Avaliações | Geminadas.com</title>
    <meta name="description" content="Confira o que nossos clientes dizem sobre os projetos de casas geminadas e sobrados da Geminadas.com. Avaliações reais de clientes em todo o Brasil.">
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/modern.css" rel="stylesheet" type="text/css" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KQXP7XG');</script>
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXP7XG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <?php include 'header.php'; ?>

    <section class="hero-modern" style="padding: 45px 0 50px 0;">
        <div class="container">
            <div class="hero-modern-content">
                <div class="hero-badge">
                    <i class="fa fa-heart"></i> Satisfação Comprovada
                </div>
                <h1 class="hero-title" style="font-size: 34px;">
                    Depoimentos de <span>Clientes Reais</span>
                </h1>
                <p class="hero-subtitle">
                    A opinião de quem confiou na Geminadas.com para construir a casa dos sonhos ou investir com segurança e rentabilidade.
                </p>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 40px; margin-bottom: 60px;">
        <div class="testimonials-grid-modern">
            <!-- Depoimento 1 -->
            <div class="testimonial-card-modern">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Equipe nota 10! Fizeram o meu projeto exatamente como eu sonhava. Super indico, parabéns equipe Geminadas.com!"
                </p>
                <div class="testimonial-author-box">
                    <img src="img/edjanebola.jpg" alt="Edjane Tavares" class="testimonial-avatar" onerror="this.src='img/icon-geminadas.png'" />
                    <div>
                        <h4 class="testimonial-author-name">Edjane Tavares</h4>
                        <p class="testimonial-author-city">Arapiraca - AL</p>
                    </div>
                </div>
            </div>

            <!-- Depoimento 2 -->
            <div class="testimonial-card-modern">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Excelente atendimento, estou muito satisfeito com o trabalho feito por vocês. Projeto aprovado rapidamente na prefeitura e sem burocracia."
                </p>
                <div class="testimonial-author-box">
                    <img src="img/joseniltonbola.jpg" alt="Josenilton Gomes" class="testimonial-avatar" onerror="this.src='img/icon-geminadas.png'" />
                    <div>
                        <h4 class="testimonial-author-name">Josenilton Gomes</h4>
                        <p class="testimonial-author-city">Goiânia - GO</p>
                    </div>
                </div>
            </div>

            <!-- Depoimento 3 -->
            <div class="testimonial-card-modern">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Super indico! Atendimento ótimo, tiraram todas as minhas dúvidas no WhatsApp com muita atenção e profissionalismo. Parabéns!"
                </p>
                <div class="testimonial-author-box">
                    <img src="img/marcelobola.jpg" alt="Marcelo Silva" class="testimonial-avatar" onerror="this.src='img/icon-geminadas.png'" />
                    <div>
                        <h4 class="testimonial-author-name">Marcelo Silva</h4>
                        <p class="testimonial-author-city">Maringá - PR</p>
                    </div>
                </div>
            </div>

            <!-- Depoimento 4 -->
            <div class="testimonial-card-modern">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Comprei o projeto pronto para um terreno de 6 metros e a obra ficou espetacular! As casas venderam ainda na fase de acabamento."
                </p>
                <div class="testimonial-author-box">
                    <div class="testimonial-avatar" style="background: #FF7A00; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px;">
                        G
                    </div>
                    <div>
                        <h4 class="testimonial-author-name">Gabriel Lúcio</h4>
                        <p class="testimonial-author-city">São Paulo - SP</p>
                    </div>
                </div>
            </div>

            <!-- Depoimento 5 -->
            <div class="testimonial-card-modern">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "O suporte da arquiteta pelo WhatsApp foi sensacional. Cada detalhe da planta foi explicado com muita clareza para o nosso mestre de obras."
                </p>
                <div class="testimonial-author-box">
                    <div class="testimonial-avatar" style="background: #0F172A; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px;">
                        M
                    </div>
                    <div>
                        <h4 class="testimonial-author-name">Mônica Tírtola</h4>
                        <p class="testimonial-author-city">Londrina - PR</p>
                    </div>
                </div>
            </div>

            <!-- Depoimento 6 -->
            <div class="testimonial-card-modern">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Plantas muito bem detalhadas e fachadas que se destacam na vizinhança. Quem vê a obra pronta fica impressionado com a beleza do projeto."
                </p>
                <div class="testimonial-author-box">
                    <div class="testimonial-avatar" style="background: #25D366; color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px;">
                        R
                    </div>
                    <div>
                        <h4 class="testimonial-author-name">Ricardo Lazarino</h4>
                        <p class="testimonial-author-city">Curitiba - PR</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- WhatsApp CTA -->
        <div class="whatsapp-conversion-box" style="margin-top: 40px;">
            <div class="whatsapp-box-badge"><i class="fa fa-star"></i> Seja o Próximo Caso de Sucesso</div>
            <h2>Quer construir ou investir com total segurança?</h2>
            <p>Junte-se a centenas de clientes satisfeitos em todo o Brasil. Fale diretamente com nosso arquiteto no WhatsApp.</p>
            <div>
                <a href="<?= $whatsapp_url ?>" target="_blank" rel="noopener" class="btn-whatsapp-finish">
                    <i class="fa fa-whatsapp"></i> FALAR COM O ARQUITETO NO WHATSAPP
                </a>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
