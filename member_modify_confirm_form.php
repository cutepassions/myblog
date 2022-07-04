<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>J B U</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel ="icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<div id="login_logo_home">
    <a href="index.php"><img src="./img/logo_home%20(1).png"></a>
</div>
<script>
function check_in()
{
if (!document.login_form.pass.value)
{
alert("비밀번호를 입력하세요");
document.login_form.pass.focus();
return;
}

document.login_form.submit();
}
</script>


<div id="main_content">
    <div id="login_box">
        <div id="login_title">
            <span>현재 비밀번호</span>
        </div>
        <div id="login_form">
            <form name="login_form" method="post" action="member_modify_confirm.php">
                <ul>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                    <input type="hidden" name="pa" value="password">
                </ul>
                <div id="login_btn">
                    <a href="#"><img src="./img/login.png" onclick="check_in()"></a>
                </div>
            </form>
        </div> <!-- login_form -->
    </div> <!-- login_box -->
</div> <!-- main_content -->


</body>
</html>


