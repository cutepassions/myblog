<!DOCTYPE html>
<head>

<meta charset="utf-8">
    <link rel ="shortcut icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
    <link rel ="icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #824c96;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
include  "db_info.php";
    // 아이디 보안
    $id = test_input($_GET["id"]);
    function test_input($id) {
        $id = trim($id);
        $id = stripslashes($id);
        $id = htmlspecialchars($id);
        return $id;
}
   if(!$id)
   {
      echo("<li>아이디를 입력해 주세요!</li>");
   }
   else
   {
       include "db_info.php";


      $sql = "select * from members where id='$id'";
      $result = mysqli_query($con, $sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo "<li>".$id." 아이디는 중복됩니다.</li>";
         echo "<li>다른 아이디를 사용해 주세요!</li>";
      }
      else
      {
         echo "<li>".$id." 아이디는 사용 가능합니다.</li>";
      }

      mysqli_close($con);
   }
?>
</p>
<div id="close">
   <img src="./img/close.png" onclick="javascript:self.close()">
</div>
</body>
</html>

