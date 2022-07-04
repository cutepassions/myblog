<?php
include "db_info.php";
include "library.php";

    $num = $_GET["num"];
    $page = $_GET["page"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["subject"])) {
            ErrorMessage("제목을 입력하세요");
        } else {
            $subject = test_input($_POST['subject']);
        }
        if (empty($_POST["content"])) {
            ErrorMessage("내용을 입력하세요");
        } else {
            $content = test_input($_POST['content']);
        }
    }
    $subject = mysqli_real_escape_string($con,$subject);
    $content = mysqli_real_escape_string($con,$content);


    /*$con = mysqli_connect("localhost", "user1", "12345", "sample");*/

    $sql = "update board set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'board_list_with_search.php?page=$page';
	      </script>
	  ";
?>

   
