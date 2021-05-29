<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َLOGIN MENGGUNAKAN AKUN GOOGLE</title>
    <link rel="stylesheet" href="view/temp/css/ststyle.css">
    <style>
       body{
                margin: 0;
                padding: 0;
                font-family: sans-serif;
                background-image: url(img/pic.jpg);
            }
    </style>
  </head>
<body>
    <form class="box">
    <?php
    include('model/configurasi.php');
    $login_button = '';
        
    if(isset($_GET["code"]))
    {
        $token = $akun_google->fetchAccessTokenWithAuthCode($_GET["code"]);

        if(!isset($token['error'])){
            $akun_google->setAccessToken($token['access_token']);
            $_SESSION['access_token'] = $token['access_token'];
            $google_service = new Google_Service_Oauth2($akun_google);
            $data = $google_service->userinfo->get();
            
            if(!empty($data['given_name'])){
                $_SESSION['nama_user'] = $data['given_name'];
            }

            if(!empty($data['family_name'])){
                $_SESSION['nama_user_2'] = $data['family_name'];
            }

            if(!empty($data['email'])){
                $_SESSION['alamat_email'] = $data['email'];
            }

            if(!empty($data['picture'])){
                $_SESSION['foto_user'] = $data['picture'];
            }
        }
    }

    if(!isset($_SESSION['access_token'])){
        $login_button = '<a href="'.$akun_google->createAuthUrl().'"><h2 class="button" >Login</h2></a>';
    }

    ?>
        <div class="container">
            <br />
            <h1 class="inputt" align="center">Login Akun Google</h1>
            <br />
            <div class="panel panel-default">
                <?php
                if($login_button == ''){
                    header('location:view/view.php');
                }else{
                    echo '<a align="center">'.$login_button . '</a>';
                }
                ?>
            </div>
        </div>
    </form>
</body>
</html>