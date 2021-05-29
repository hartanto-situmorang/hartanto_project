<?php
    require_once '../vendor/autoload.php';
    
    $akun_google= new Google_Client();
    $akun_google->setClientId('888705549507-ug0l5c0npv4gmmkglgpv811k6u8v51a1.apps.googleusercontent.com');
    $akun_google->setClientSecret('EqREDwqczsJEer1PZJjU5Jfk');
    $akun_google->setRedirectUri('http://localhost/Project_UTS/');
    $akun_google->addScope('email');
    $akun_google->addScope('profile');

    session_start();

    $akun_google->revokeToken();
    session_destroy();
    header('location:../index.php');
?>