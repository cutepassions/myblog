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
        if (empty($_POST["pass_confirm"])) {
            ErrorMessage("비밀번호 확인을 입력하세요");
        } else {
            $pass_confirm = test_input($_POST["pass_confirm"]);
        }
        if (empty($_POST["current_pass"])) {
            ErrorMessage("현재 비밀번호를 입력하세요");
        } else {
            $current_pass = test_input($_POST["current_pass"]);
        }
        if (empty($_POST["name"])) {
            ErrorMessage("이름을 입력하세요");
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["email1"])) {
            ErrorMessage("이메일을 입력하세요");
        } else {
            $email1 = test_input($_POST["email1"]);
        }
        if (empty($_POST["email2"])) {
            ErrorMessage("이메일을 입력하세요");
        } else {
            $email2 = test_input($_POST["email2"]);
        }
    }

    $email = $email1."@".$email2;

    $userid = mysqli_real_escape_string($con,$userid);
    $pass = mysqli_real_escape_string($con,$pass);
    $pass_confirm = mysqli_real_escape_string($con,$pass_confirm);
    $current_pass = mysqli_real_escape_string($con,$current_pass);
    $name = mysqli_real_escape_string($con,$name);
    $email1 = mysqli_real_escape_string($con,$email1);
    $email2 = mysqli_real_escape_string($con,$email2);



    $sql = "select pass from members where id = '$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $dbpass = $row['pass'];

    if ($current_pass == $dbpass){
        $sql3 = "update members set pass='$pass', name='$name' , email='$email' where id = '$userid'";
        mysqli_query($con, $sql3);
        mysqli_close($con);
        echo "
              <script>
                 alert('회원정보가 변경되었습니다.');
                  location.href = 'index.php';
              </script>
          ";
    }
    else{
        echo"
        <script>
        alert('현재 비밀번호가 올바르지 않습니다.');
        history.go(-1);
        </script>
        ";
    }

?>

   
