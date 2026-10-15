<?php

session_start();

if (!isset($_SESSION['clientes_id'])) {
    
    unset($_SESSION['clientes_id']);

    echo "<script>window.location.href = \"../login/\";</script>";
    exit;
}
?>
