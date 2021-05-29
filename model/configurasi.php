<?php
    require_once 'vendor/autoload.php';
    
    $akun_google = new Google_Client();
    $akun_google->setClientId('888705549507-nm8feh6h1ljj77nuo2dmt4hlqis0k6pp.apps.googleusercontent.com');
    $akun_google->setClientSecret('rTKxl8TnRXfTfGmRPB6UKEoo');
    $akun_google->setRedirectUri('http://localhost/hartanto_project_uts/');
    $akun_google->addScope('email');
    $akun_google->addScope('profile');

    session_start();

?>