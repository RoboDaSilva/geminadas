<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <base href="/">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Retorno PagSeguro</title>
        <link rel="shortcut icon" href="img/favicon.png" />

        <style type="text/css">
            <!--
            body,td,th {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 10px;
                color: #333333;
            }
            body {
                background-color: #FFFFFF;
                margin-left: 0px;
                margin-top: 0px;
                margin-right: 0px;
                margin-bottom: 0px;
                background-image: url();
            }
            -->
        </style>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KQXP7XG');</script>
<!-- End Google Tag Manager -->
    </head>

    <body>
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQXP7XG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="430"><table width="500" border="0" align="center" cellpadding="10" cellspacing="0">
                        <tr>
                            <td width="100%"><div align="center">
                                    <?php
                                    require 'init.php';

                                    if (isset($_GET['transaction_id'])) {
                                        include_once 'admin/model/PagSeguroTransacoes.php';

                                        $model_PagSeguroTransacoes = new Model_PagSeguroTransacoes();
                                        @$ps = $model_PagSeguroTransacoes->search(null, array('TransacaoID = ?' => $_GET['transaction_id']));

                                        if (empty($ps[0]['TransacaoID'])) {
                                            exit("<script>alert('Esta transacao nao existe!');</script>");
                                        }
                                    }

                                    if (isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction') {


                                        include_once 'admin/model/Empresa.php';
                                        $model_empresa = new Model_Empresa();
                                        $empresa = $model_empresa->find(1);
                                        $email = $empresa['email_pagseguro'];
                                        $token = $empresa['token_pagseguro'];

                                        $url = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

                                        $curl = curl_init($url);
                                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                        $transaction = curl_exec($curl);
                                        curl_close($curl);

                                        if ($transaction == 'Unauthorized') {

                                            $headers = "MIME-Version: 1.0\r\n";
                                            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                                            $headers .= "From: \"GEMINADAS\"<financeiro@geminadas.com>\r\n";

                                            $mensagem = $transaction;


                                            mail("financeiro@geminadas.com", "[GEMINADAS] Problemas para identificar a transacao", "$mensagem", "$headers");

                                            exit; //Mantenha essa linha
                                        }

                                        $transaction = simplexml_load_string($transaction);

                                        include_once 'admin/model/PagSeguroTransacoes.php';

                                        $model_PagSeguroTransacoes = new Model_PagSeguroTransacoes();
                                        $ps = $model_PagSeguroTransacoes->search(null, array('Referencia = ?' => $transaction->reference));

                                        //Verifica se a transacao já existe através da referencia, pois o cliente pode mudar
                                        //a forma de pagamento, isto geraria um novo token para a mesma referencia
                                        // duplicando o registro na tabela
                                        if (!empty($ps[0]['Referencia'])) {
                                            $pagseguro['id'] = $ps[0]['id'];
                                            //Verifica se a transacao esta vindo igual a transacao salva no BD
                                            if ($ps[0]['Referencia'] <> $transaction->reference) {

                                                $headers = "MIME-Version: 1.0\r\n";
                                                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                                                $headers .= "From: \"GEMINADAS\"<financeiro@geminadas.com>\r\n";

                                                $mensagem = 'Houve uma tentativa de burlar o sistema em ' . date('d/m/Y') . ' as ' . date('H:s:i') . '!!!/n/n';
                                                $mensagem .= 'IP: ' . $_SERVER["REMOTE_ADDR"] . '/n/n';
                                                $mensagem .= var_dump($_POST);

                                                exit(
                                                        mail("financeiro@geminadas.com", "[GEMINADAS] ANTI FRAUDE", "$mensagem", "$headers")
                                                );
                                            }
                                        }

                                        $pagseguro['TransacaoID'] = $transaction->code;
                                        $pagseguro['Referencia'] = $transaction->reference;
                                        $pagseguro['NumItens'] = $transaction->itemCount;

                                        switch ($transaction->paymentMethod->type) {
                                            case 1;
                                                $TipoPagamento = 'Cartão de crédito';
                                                break;
                                            case 2;
                                                $TipoPagamento = 'Boleto';
                                                break;
                                            case 3;
                                                $TipoPagamento = 'Débito online (TEF)';
                                                break;
                                            case 4;
                                                $TipoPagamento = 'Saldo PagSeguro';
                                                break;
                                            case 5;
                                                $TipoPagamento = 'Oi Paggo';
                                                break;
                                            case 6;
                                                $TipoPagamento = 'Depósito em conta';
                                                break;
                                        }

                                        $pagseguro['TipoPagamento'] = $TipoPagamento;

                                        $data = substr($transaction->lastEventDate, 0, 9);
                                        $hora = substr($transaction->lastEventDate, 11, 18);
                                        $pagseguro['datahora'] = $data . ' ' . $hora;
                                        $pagseguro['data'] = $data;
                                        $pagseguro['hora'] = $hora;

                                        switch ($transaction->status) {
                                            case 1;
                                                $StatusTransacao = 'Aguardando pagamento';
                                                break;
                                            case 2;
                                                $StatusTransacao = 'Em análise';
                                                break;
                                            case 3;
                                                $StatusTransacao = 'Paga';
                                                break;
                                            case 4;
                                                $StatusTransacao = 'Disponível';
                                                break;
                                            case 5;
                                                $StatusTransacao = 'Em Disputa';
                                                break;
                                            case 6;
                                                $StatusTransacao = 'Devolvida';
                                                break;
                                            case 7;
                                                $StatusTransacao = 'Cancelada';
                                                break;
                                            case 8;
                                                $StatusTransacao = 'Chargeback debitado';
                                                break;
                                            case 9;
                                                $StatusTransacao = 'Em contestação';
                                                break;
                                        }
                                        $pagseguro['StatusTransacao'] = $StatusTransacao;

                                        $pagseguro['CliNome'] = $transaction->sender->name;
                                        $pagseguro['CliEmail'] = $transaction->sender->email;
                                        $pagseguro['CliTelefone'] = '(' . $transaction->sender->phone->areaCode . ')' . $transaction->sender->phone->number;
                                        $pagseguro['CliEndereco'] = $transaction->shipping->address->street;
                                        $pagseguro['CliNumero'] = $transaction->shipping->address->number;
                                        $pagseguro['CliComplemento'] = $transaction->shipping->address->complement;
                                        $pagseguro['CliBairro'] = $transaction->shipping->address->district;
                                        $pagseguro['CliCidade'] = $transaction->shipping->address->city;
                                        $pagseguro['CliEstado'] = $transaction->shipping->address->state;
                                        $pagseguro['CliCEP'] = $transaction->shipping->address->street;

                                        $pagseguro['ProdID'] = $transaction->items->item->id;
                                        $pagseguro['ProdDescricao'] = $transaction->items->item->description;
                                        $pagseguro['ProdValor'] = $transaction->items->item->amount;
                                        $pagseguro['ProdQuantidade'] = $transaction->items->item->quantity;
                                        $pagseguro['ProdFrete'] = $transaction->sender->shipping->cost;
                                        $pagseguro['ProdExtras'] = $transaction->sender->shipping->cost;

                                        $model_PagSeguroTransacoes->save($pagseguro);

                                        include_once 'admin/model/Venda.php';

                                        $model_venda = new Model_Venda();
                                        @$venda = $model_venda->search(null, array('id = ?' => $transaction->items->item->id));

                                        if ($venda[0]['id'] > 0) {
                                            $upVenda['id'] = $transaction->items->item->id;
                                            $upVenda['transacaoId'] = $transaction->code;
                                            $upVenda['statusTransacao'] = $StatusTransacao;

                                            $model_venda->save($upVenda);
                                        }
                                    }
                                    ?>
                                    <br />
                                </div>

                                <script type="text/javascript">
                                    var numero = 10;
                                    function chamar() {
                                        if (numero > 0) {
                                            document.getElementById('timers').innerHTML = --numero;
                                        }
                                    }
                                    setInterval("chamar();", 1000);
                                    setTimeout("window.close();", 10000);
                                </script>
                                <table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
                                    <tr>
                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                                                <tr>
                                                    <td bgcolor="#f4f4f4">
                                                        <div align="center"><strong>Seu pagamento foi conclu&iacute;do com sucesso!</strong></div>
                                                        <p></p>
                                                        <div align="center">Essa p&aacute;gina se fechar&aacute; em: <br><div style="font-size: 20px;" id="timers">10</div></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>