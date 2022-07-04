<?php
    include "db_info.php";
    include "library.php";
    include "recaptchalib.php";
    include "token.php";

    session_start();
    $_SESSION['session_token'];

    // Anti-CSRF
    if (!($_SESSION['session_token'])) {
        $session_token = "";
    } else {
        $session_token = $_SESSION['session_token'];
    }

    $user_token = $_POST['user_token'];
    checkToken($user_token, $session_token);


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

    }

    $id = mysqli_real_escape_string($con,$id);
    $pass = mysqli_real_escape_string($con,$pass);

   $sql = "select * from members where id='$id'";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

    if( !$_POST['g-recaptcha-response'] ) {
        // What happens when the CAPTCHA was entered incorrectly
        echo ("
                <script>
                alert('캡챠가 올바르지 않습니다');
                history.go(-1)
                </script>");
        return;
    }




    if (!$num_match) {
        sleep(rand(0, 3));
        echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    } else {

        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if ($pass != $db_pass) {
            sleep(rand(0, 3));
            echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
            exit;
        } else {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];
            if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
            if ($userlevel == 1) {
                echo("
                <script>
                window.alert('관리자로 로그인하였습니다.');
                location.href='index.php';
                </script>");
            } else {

                echo("    
              <script>
              location.href = 'index.php';
              </script>
            ");
            }
        }
    }


?>