<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>J B U</title>
    <link rel ="icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
</head>
<body>
<style>
    h3 {
        padding-left: 5px;
        border-left: solid 5px #824c96;
        font-size: 20px;
    }
</style>
<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";

if($userlevel==1 ){
    echo "<script>
alert('관리자는 회원탈퇴를 할 수 없습니다.')
location.href = 'index.php'
</script>";
}

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
<script>
    function check_pass(){
        if (!document.member_delete.pass.value) {
            alert("비밀번호를 입력하세요.");
            member_delete.pass.focus();
            return;
        }
        if (!document.member_delete.pass_confirm.value) {
            alert("비밀번호 확인을 입력하세요.");
            member_delete.pass_confirm.focus();
            return;
        }
        if (document.member_delete.pass.value !=
            document.member_delete.pass_confirm.value)
        {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
            document.member_delete.pass.focus();
            document.member_delete.pass.select();
            return;
        }

        if (document.member_delete.pass.value !=
            <?=$pass?>;)
        {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
            document.member_delete.pass.focus();
            document.member_delete.pass.select();
            return;
        }
        document.member_delete.submit();
    }
</script>
    <div align="">
    <h3>회원 탈퇴</h3>
    <form name='member_delete' method='post' action="member_delete_confirm.php">
        <li>비밀번호 : <input type="password" name="pass"></li><br>
        <li>비밀번호 확인 : <input type="password" name="pass_confirm"></li>
        <br>
        <button style="cursor:pointer" onclick="check_pass()">완료</button>

    </form>
    </div>



</body>
</html>