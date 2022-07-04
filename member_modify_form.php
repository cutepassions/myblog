<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>J B U</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
    <link rel ="shortcut icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
    <link rel ="icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
<script type="text/javascript" src="./js/member_modify2.js"></script>
</head>
<body> 

<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
if (isset($_SESSION["pa"])) $pa = $_SESSION["pa"];
else $pa = "";


    include "db_info.php";
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];

    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con);
?>

<?=
session_start();
if (!$pa)
{
    echo"
    <script>
    alert('정상적인 접근이 아닙니다');
    location.href='index.php';
    </script>
    ";
}
?>

<div id="member_logo_home">
    <a href="index.php"><img src="./img/logo_home%20(1).png"></a>
</div>

        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?=$userid?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>
                <div class="form">
                    <div class="col1">현재 비밀번호</div>
                    <div class="col2">
                        <input type="password" name="current_pass">
                    </div>
                </div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" value="<?=$email1?>">@<input 
							       type="text" name="email2" value="<?=$email2?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
                <br><br><br><br><br><br><br><br>
                <?php
                if ($userlevel != 1)
                { ?>
                    <div style="text-align: center">
                        <a href="#" onclick="window.open('member_delete.php','J B U','width=650px,height=400px,left=625px,top=300px')">회원탈퇴</a>
                    </div>
                    <?php
                }
                ?>

           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->


</body>
</html>

