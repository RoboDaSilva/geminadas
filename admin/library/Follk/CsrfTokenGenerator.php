<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = sha1(uniqid(rand(), true));
}