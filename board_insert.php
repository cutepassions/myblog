<meta charset="utf-8">
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

    if ( $userlevel != 1 )
    {
        echo("
                    <script>
                    alert('게시판 글쓰기는 관리자 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    include "library.php";
    include "db_info.php";

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


	date_default_timezone_set('Asia/Seoul');
	// 또는 php.ini 에서 date.timezone=Asia/Seoul 로 설정

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$upload_dir = './data/';

	$upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
	$upfile_error    = $_FILES["upfile"]["error"];

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

        if (((strtolower($file_ext)=='jpeg') or (strtolower($file_ext)=='jpg') or (strtolower($file_ext)=='png'))and getimagesize($upfile_tmp_name) ){
		$new_file_name = date("Y_m_d_H_i_s");
		//$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;


            if( $upfile_size  > 1000000 ) {
                    ErrorMessage('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요!');
                    /*echo("
                    <script>
                    alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
                    history.go(-1)
                    </script>
                    ");*/
                    exit;
            }

            if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
            {
                    ErrorMessage('파일을 지정한 디렉토리에 복사하는데 실패했습니다..');
                    /*echo("
                        <script>
                        alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
                        history.go(-1)
                        </script>
                    ");
                    exit;*/
            }
        }
        else {
            ErrorMessage('사진만 업로드 가능합니다. ex) jpeg, jpg, png');
        }
    }
	else {
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	}


	/*$con = mysqli_connect("localhost", "user1", "12345", "sample");*/

	$sql = "insert into board (id, name, subject, content, regist_day, hit,  file_name, file_type, file_copied) ";
	$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
	$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	// 포인트 부여하기
  	$point_up = 100;

	$sql = "select point from members where id='$userid'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$new_point = $row["point"] + $point_up;
	
	$sql = "update members set point=$new_point where id='$userid'";
	mysqli_query($con, $sql);

	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	   alert('글 작성이 완료되었습니다.')
	    location.href = 'board_list_with_search.php';
	   </script>
	";
?>

  
