<?php

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    include "db_info.php";

    /*$con = mysqli_connect("localhost", "user1", "12345", "sample");*/

    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }

    $sql = "delete from board where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list_with_search.php?page=$page';
	     </script>
	   ";
?>

