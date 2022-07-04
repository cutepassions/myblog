<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>J B U</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/board.css">
    <link rel="stylesheet" type="text/css" href="./css/message.css">
    <link rel ="shortcut icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
</head>
<body>
<div id="message_logo_home">
    <a href="index.php"><img src="./img/logo_home%20(1).png"></a>
</div>


<?php

session_start();
if (isset($_SESSION["userid"]))
    $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"]))
    $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"]))
    $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"]))
    $userpoint = $_SESSION["userpoint"];
else $userpoint = "";

?>

<section>

    <div id="board_box">
        <h3>
            게시판 > 목록보기
        </h3>
        <ul id="board_list">
            <li>
                <span class="col1">번호</span>
                <span class="col2">제목</span>
                <span class="col3">글쓴이</span>
                <span class="col4">첨부</span>
                <span class="col5">등록일</span>
                <span class="col6">조회</span>
            </li>
            <?php

            if (isset($_GET["page"]))
                $page = $_GET["page"];  //$page : 현재 페이지 번호
            else
                $page = 1;              //$page : 현재 페이지 번호

            include "db_info.php";
            include "library.php";

            /* $con = mysqli_connect("localhost", "user1", "12345", "sample"); */
            if (ISSET($_GET['mode']))
                $mode = $_GET['mode'];
            else $mode=null;

            if ($mode=="search")
            {
                $search = $_POST['search'];
                $find = $_POST['find'];
                $search = test_input($search);
                $find = test_input($find);
                $search = mysqli_real_escape_string($con,$search);
                $find = mysqli_real_escape_string($con,$find);
                if(!$search)
                {
                    echo("
              <script>
                 window.alert('검색할 단어를 입력해 주세요!');
                 location.href='board_list_with_search.php';
              </script>
            ");
                    exit;
                }

                $sql = "select * from board where $find like '%$search%' order by num desc";

            }
            else {
                $sql = "SELECT * FROM board ORDER BY num DESC";
            }

            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result); // 전체 글 수

            $scale = 10;   // 한 페이지에 보여주고자 하는 글의 갯수

            // 전체 페이지 수($total_page) 계산
            if ($total_record % $scale == 0)
                $total_page = floor($total_record/$scale);
            else
                $total_page = floor($total_record/$scale) + 1;

            // 표시할 페이지($page)에 따라 $start 계산
            $start = ($page - 1) * $scale;

            $number = $total_record - $start;

            for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
            {
                mysqli_data_seek($result, $i);
                // 가져올 레코드로 위치(포인터) 이동
                $row = mysqli_fetch_array($result);
                // 하나의 레코드 가져오기
                $num         = $row["num"];
                $id          = $row["id"];
                $name        = $row["name"];
                $subject     = $row["subject"];
                $regist_day  = $row["regist_day"];
                $hit         = $row["hit"];
                if ($row["file_name"])
                    $file_image = "<img src='./img/file.gif'>";
                else
                    $file_image = " ";
                ?>
                <li>
                    <span class="col1"><?=$number?></span>
                    <span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$file_image?></span>
                    <span class="col5"><?=$regist_day?></span>
                    <span class="col6"><?=$hit?></span>
                </li>
                <?php
                $number--;
            }
            mysqli_close($con);

            ?>


        </ul>
        <br>
        <br>
        <ul id="search-f">
            <form name="search_form" method="post" action="board_list_with_search.php?mode=search">
                <div id="list_search">
                    <select name="find">
                        <option value='subject'>제목</option>
                        <option value='name'>글쓴이</option>
                    </select>
                    <input type="text" name="search">
                    <input type="submit" value="검색">
                </div>
            </form>
        </ul>
        <ul id="page_num">

            <?php
            if ($total_page>=2 && $page >= 2)
            {
                $new_page = $page-1;
                echo "<li><a href='board_list_with_search.php?page=$new_page'>◀ 이전</a> </li>";
            }
            else
                echo "<li>&nbsp;</li>";

            // 게시판 목록 하단에 페이지 링크 번호 출력
            for ($i=1; $i<=$total_page; $i++)
            {
                if ($page == $i)     // 현재 페이지 번호 링크 안함
                {
                    echo "<li><b> $i </b></li>";
                }
                else
                {
                    echo "<li><a href='board_list_with_search.php?page=$i'> $i </a><li>";
                }
            }
            if ($total_page>=2 && $page != $total_page)
            {
                $new_page = $page+1;
                echo "<li> <a href='board_list_with_search.php?page=$new_page'>다음 ▶</a> </li>";
            }
            else
                echo "<li>&nbsp;</li>";
            ?>
        </ul> <!-- page -->
        <ul class="buttons">
            <li><button onclick="location.href='board_list_with_search.php'">목록</button></li>
            <li>
                <?php
                if($userlevel == 1) {
                    ?>
                    <button onclick="location.href='board_form.php'">글쓰기</button>
                    <?php
                }
                ?>

            </li>
        </ul>
    </div> <!-- board_box -->
</section>

</body>
</html>
