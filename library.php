<?php

  function test_input($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data, ENT_QUOTES);//''(홑따옴표) 와 ""(겹따옴표) 둘다 변환
      return $data;
  }

  function ErrorMessage($message, $type = "on")
{
    echo "<script> alert('$message'); ";
    if ($type == "on") echo " history.back(); ";
    echo "</script>";
    exit;
}
?>
