<meta charset='utf-8'>
<?php
    include "library.php";
    include "db_info.php";
    $send_id = $_GET["send_id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["rv_id"])) {
            ErrorMessage("받는 사람을 입력하세요");
        } else {
            $rv_id = test_input($_POST["rv_id"]);
        }
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
    date_default_timezone_set('Asia/Seoul');
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $send_id = mysqli_real_escape_string($con,$send_id);
    $rv_id = mysqli_real_escape_string($con,$rv_id);
    $subject = mysqli_real_escape_string($con,$subject);
    $content = mysqli_real_escape_string($con,$content);

	if(!$send_id) {
		echo("
			<script>
			alert('로그인 후 이용해 주세요! ');
			history.go(-1)
			</script>
			");
		exit;
	}

include "db_info.php";
	$sql = "select * from members where id='$rv_id'";
	$result = mysqli_query($con, $sql);
	$num_record = mysqli_num_rows($result);

	if($num_record)
	{
		$sql = "insert into message (send_id, rv_id, subject, content,  regist_day) ";
		$sql .= "values('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
	} else {
		echo("
			<script>
			alert('받는 사람 아이디가 잘못 되었습니다!');
			history.go(-1)
			</script>
			");
		exit;
	}

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'message_box.php?mode=send';
	   </script>
	";
?>

  
