<?php
include "library.php";
include "db_info.php";

session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["pass"])) {
        ErrorMessage("비밀번호를 입력하세요");
    } else {
        $pass = test_input($_POST["pass"]);
    }

    if (empty($_POST["pa"])) {
        ErrorMessage("정상적인 접근이 아닙니다");
    } else {
        $pa = test_input($_POST["pa"]);
    }
}

$pass = mysqli_real_escape_string($con,$pass);


$sql = "select * from members where id='$userid'";
$result = mysqli_query($con, $sql);
$row    = mysqli_fetch_array($result);
$db_pass = $row["pass"];
mysqli_close($con);

if ($pa){
    if ($pass==$db_pass){
        session_start();
        $_SESSION["pa"] = $pa["pa"];
        echo "
              <script>
                  location.href = 'member_modify_form.php';
              </script>
          ";
    }
    else{
        echo "
        <script>
            alert('비밀번호가 올바르지 않습니다');
            history.go(-1);
        </script>
        ";
    }
}
else{
    ErrorMessage('정상적인 접근이 아닙니다.');
}



?>





