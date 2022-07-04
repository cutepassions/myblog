<?php

    include "db_info.php";
    include "library.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["id"])) {
            ErrorMessage("아이디를 입력하세요");
        } else {
            $id = test_input($_POST["id"]);
        }
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

    $id = mysqli_real_escape_string($con,$id);
    $pass = mysqli_real_escape_string($con,$pass);
    $pass_confirm = mysqli_real_escape_string($con,$pass_confirm);
    $name = mysqli_real_escape_string($con,$name);
    $email1 = mysqli_real_escape_string($con,$email1);
    $email2 = mysqli_real_escape_string($con,$email2);

date_default_timezone_set('Asia/Seoul');
    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

//    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from members where id='$id'";
    $result = mysqli_query($con, $sql);
    $num_record = mysqli_num_rows($result);

    if ($num_record) {
        echo "
        <script>
            location.href = 'member_overlap.php'
        </script>";
    } else {

        $sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
        $sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

        mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
        mysqli_close($con);

        echo "
	      <script>
	          location.href = 'member_complete.php';
	      </script>
	  ";
    }
?>

   
