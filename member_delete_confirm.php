<?php
    include "db_info.php";
    include "library.php";
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
    }

    $sql5   = "select * from members where id='$userid'";
    $result2 = mysqli_query($con, $sql5);
    $row    = mysqli_fetch_array($result2);
    $pass2 = $row["pass"];

    if ($pass==$pass_confirm) {
        if ($pass == $pass2) {
            $sql = "select * from members where pass='$pass2'";
            $result = mysqli_query($con, $sql);
            $num_match = mysqli_num_rows($result);
            if ($num_match) {
                $sql2 = "delete from members where id = '$userid'";
                $sql3 = "delete from message where rv_id = '$userid'";
                $sql4 = "delete from message where send_id = '$userid'";
                mysqli_query($con, $sql2);
                mysqli_query($con, $sql3);
                mysqli_query($con, $sql4);
                mysqli_close($con);
                session_start();
                unset($_SESSION["userid"]);
                unset($_SESSION["username"]);
                unset($_SESSION["userlevel"]);
                unset($_SESSION["userpoint"]);
                echo "
                <script>
                    location.href ='delete.php';
                </script>";
            }
            else mysqli_close($con);{
                sleep(rand(0,3));
                echo "
                <script>
                    alert('비밀번호를 다시 입력해주세요');
                    history.go(-1);
                </script>";
            }
        }
        else {
            sleep(rand(0,3));
            echo "
                <script>
                    alert('비밀번호가 일치하지 않습니다');
                    history.go(-1);
                </script>";
        }
    }
    else {
        sleep(rand(0,3));
    echo "
            <script>
                alert('비밀번호가 서로 일치하지 않습니다');
                history.go(-1);
            </script>";
    }

?>