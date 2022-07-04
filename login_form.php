<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>J B U</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">

    <script type="text/javascript" src="./js/login.js"></script>
    <link rel ="icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<?=
include "token.php";

generateSessionToken();
?>

<div id="login_logo_home">
<a href="index.php"><img src="./img/logo_home%20(1).png"></a>
</div>

    <div id="main_content">
        <div id="login_box">
            <div id="login_title">
                <span>로그인</span>
            </div>
            <div id="login_form">
                <form name="login_form" method="post" action="login.php">
                    <ul>
                        <li><input type="text" name="id" placeholder="아이디" ></li>
                        <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                    </ul>
                    <div id="login_btn">
                        <a href="#"><img src="./img/login.png" onclick="check_input()"></a>
                    </div>
                    <div id="sign_up_btn">
                        <a href="#"><img src="./img/sing_up.png" onclick="window.open('member_form.php','J B U','width=650px,height=400px,left=625px,top=300px')"></a>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LcvjEkdAAAAAJCAPaLHBVsXRVTbNim0-vQVnPty"></div>
                    <input type='hidden' name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' />

                </form>
            </div> <!-- login_form -->
        </div> <!-- login_box -->
    </div> <!-- main_content -->


</body>
</html>



