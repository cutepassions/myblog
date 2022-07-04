<!DOCTYPE html>
<html>
<title>J B U</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
<script src="https://www.w3schools.com/lib/w3.js"></script>

<!-- 글시체 -->
<style>
body, h1, h2, h3, h4, h5, h6  {
font-family: Verdana, Geneva, sans-serif;
}
</style>
<head>
    <link rel ="shortcut icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
    <link rel ="icon" href="./img/_______x__ioA_icon.ico" type="image/x-icon">
</head>
<body>
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
        else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
        else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
        else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
        else $userpoint = "";

unset($_SESSION["pa"]);
?>

<script>
    function sign_up(){
        window.open("member_form.php","J B U","width=650px,height=400px,left=625px,top=300px")
    }
    function myFunction() {
        var x = document.getElementById("mobile");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    function myFunction2() {
        var y = document.getElementById("about");
        if (y.className.indexOf("w3-show") == -1) {
            y.className += " w3-show";
        } else {
            y.className = y.className.replace(" w3-show", "");
        }
    }
    function myFunction3() {
        var z = document.getElementById("about2");
        if (z.className.indexOf("w3-show") == -1) {
            z.className += " w3-show";
        } else {
            z.className = z.className.replace(" w3-show", "");
        }
    }
    function myFunction4() {
        var v = document.getElementById("board");
        if (v.className.indexOf("w3-show") == -1) {
            v.className += " w3-show";
        } else {
            v.className = v.className.replace(" w3-show", "");
        }
    }
    function myFunction5() {
        var a = document.getElementById("board_M");
        if (a.className.indexOf("w3-show") == -1) {
            a.className += " w3-show";
        } else {
            a.className = a.className.replace(" w3-show", "");
        }
    }
</script>




<!-- 네비게이션 -->
<div class="w3-top">
<div class="w3-bar w3-white w3-padding w3-card">
    <div class="w3-content" style="max-width: 100%">
    <a href="#JBU"><img src="./img/logo_transparent%20(1)%20(2).png" width="100%" class="w3-bar-item w3-button"></a>
    </div>
    <div class="w3-right w3-hide-small">
        <div class="w3-dropdown-click w3-mobile">
            <button class="w3-button w3-mobile" onclick="myFunction2()">About <i class="fa fa-caret-down"></i></button>
            <div id="about" class="w3-dropdown-content w3-bar-block w3-black">
               <a href="#Photo" class="w3-bar-item w3-button w3-mobile">Photo</a>
               <a href="#Birth" class="w3-bar-item w3-button w3-mobile">Birth</a>
               <a href="#Education" class="w3-bar-item w3-button w3-mobile">Education</a>
               <a href="#Certification" class="w3-bar-item w3-button w3-mobile">Certification</a>
           </div>
       </div>
        <div class="w3-dropdown-click w3-mobile">
            <button class="w3-button w3-mobile" onclick="myFunction4()">Board <i class="fa fa-caret-down"></i></button>
            <div id="board" class="w3-dropdown-content w3-bar-block w3-black">
                <a href="board_list_with_search.php" class="w3-bar-item w3-button w3-mobile">Notice</a>
                <a href="http://woosuk.izerone.co.kr:8090/~s120171838/CIproject" class="w3-bar-item w3-button w3-mobile">CodeEgniter</a>
            </div>
        </div>
        <a href="#Contact" class="w3-bar-item w3-button w3-mobile">Contact</a>

<?php
        if(!$userid) {
?>
        <a href="#" onclick="sign_up()" class="w3-bar-item w3-button w3-mobile">Sign Up</a>
        <a href="login_form.php" class="w3-bar-item w3-button w3-mobile">Login</a>
<?php
} else { $mode = "rv";
?>
        <a href="member_modify_confirm_form.php" class="w3-bar-item w3-button w3-mobile">Profile</a>
        <a href="message_box.php?mode=<?=$mode?>" class="w3-bar-item w3-button w3-mobile">Message</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-mobile">Logout</a>
<?php
        }
?>
    </div>
    <!--모바일 변경시에 표시 -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
    <div id="mobile" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
        <div class="w3-dropdown-click w3-mobile">
            <button class="w3-button w3-mobile" onclick="myFunction3()">About <i class="fa fa-caret-down"></i></button>
            <div id="about2" class="w3-dropdown-content w3-bar-block w3-black">
                <a href="#Photo" class="w3-bar-item w3-button w3-mobile">Photo</a>
                <a href="#Birth" class="w3-bar-item w3-button w3-mobile">Birth</a>
                <a href="#Education" class="w3-bar-item w3-button w3-mobile">Education</a>
                <a href="#Certification" class="w3-bar-item w3-button w3-mobile">Certification</a>
            </div>
        </div>
        <div class="w3-dropdown-click w3-mobile">
            <button class="w3-button w3-mobile" onclick="myFunction5()">Board <i class="fa fa-caret-down"></i></button>
            <div id="board_M" class="w3-dropdown-content w3-bar-block w3-black">
                <a href="board_list_with_search.php" class="w3-bar-item w3-button w3-mobile">Notice</a>
                <a href="http://woosuk.izerone.co.kr:8090/~s120171838/CIproject" class="w3-bar-item w3-button w3-mobile">CodeEgniter</a>
            </div>
        </div>
        <a href="#Contact" class="w3-bar-item w3-button">Contact</a>
        <?php
        if(!$userid) {
            ?>
            <a href="#" onclick="sign_up()" class="w3-bar-item w3-button">Sign Up</a>
            <a href="login_form.php" class="w3-bar-item w3-button">Login</a>
            <?php
        } else { $mode = "rv";
            ?>
            <a href="member_modify_confirm_form.php" class="w3-bar-item w3-button">Profile</a>
            <a href="message_box.php?mode=<?=$mode?>" class="w3-bar-item w3-button">Message</a>
            <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
            <?php
        }
        ?>
    </div>
    </div>
</div>
</div>



<!-- 홈 -->
<div id="JBU" class="w3-content" style="max-width:70%">
    <!-- 이미지 -->
    <div class="w3-display-container w3-content" style="max-width:100%">
        <img class="w3-image" src="./img/tent-5441144_1920.jpg" alt="tent" width="100%">
    </div>

<!-- About -->
<div id="#" class="w3-container w3-padding-32">
    <h1 class="w3-center w3-wide">J B U</h1>
    <p align="center">This cite introduces Jin Byeong Uk</p>
</div>

    <!-- Photo -->
    <div id="Photo" class="w3-row-padding w3-padding-32 w3-panel w3-border w3-border-purple w3-round-xxlarge w3-margin-top">
        <h2 class="w3-center w3-wide">Photo</h2>
        <div class="w3-third">
            <div class="w3-card-4 w3-margin" style="width:80%">
                <img src="./img/baby.jpg" style="width:100%">
                <div class="w3-container">
                    <h5 class="w3-center">2 years old</h5>
                </div>
            </div>
        </div>

        <div class="w3-third">
            <div class="w3-card-4 w3-margin" style="width:80%">
                <img src="./img/student.jpg" style="width:100%">
                <div class="w3-container">
                    <h5 class="w3-center">17 years old</h5>
                </div>
            </div>
        </div>

        <div class="w3-third">
            <div class="w3-card-4 w3-margin" style="width:80%">
                <img src="./img/man.jpg" style="width:100%">
                <div class="w3-container">
                    <h5 class="w3-center">22 years old</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- MediumOrchid 배경 색 -->
    <div class = "w3-panel w3-border w3-border-purple w3-round-xxlarge" >

    <!-- Birth -->
        <div class = "w3-panel w3-border w3-border-purple w3-round-xxlarge" >
    <div id="Birth" class="w3-padding-32">
        <h2 class="w3-center w3-wide">Birth</h2>
        <ul class="w3-margin-left">
            <li class="w3-wide ">1998년 4월 30일</li>
            <li class="w3-wide ">전라북도 전주시 완산구</li>
        </ul>
    </div>
        </div>


    <!-- Education -->
        <div class = "w3-panel w3-border w3-border-purple w3-round-xxlarge" >
    <div id="Education" class="w3-padding-32">
        <h2 class="w3-center w3-wide">Education</h2>
    <ul class="w3-margin-left">
        <li class="w3-wide ">전주인후초등학교 졸업</li>
        <li class="w3-wide ">전주아중중학교 졸업</li>
        <li class="w3-wide ">전주제일고등학교 졸업</li>
        <li class="w3-wide ">우석대학교 정보보안학과 재학중</li>
    </ul>
    </div>
        </div>

    <!-- Certification -->
        <div class = "w3-panel w3-border w3-border-purple w3-round-xxlarge" >
    <div id="Certification" class="w3-padding-32">
        <h2 class="w3-center w3-wide">Certification</h2>
        <ul class="w3-margin-left">
            <li class="w3-wide ">정보처리기능사</li>
            <li class="w3-wide ">자동차운전면허증 1종 보통</li>
        </ul>
    </div>
    </div>


    <!-- Contact -->
    <div id="Contact" class="w3-container w3-center w3-padding-64 w3-margin">
        <h2 class="w3-wide">Contact</h2>
        전라북도 전주시<br>
        Phone : 010-0000-0000<br>
        Email : @naver.com<br>

        <form action="/action_page.php" target="_blank">
            <input class="w3-input" type="text" placeholder="Name" required name="Name">
            <input class="w3-input" type="text" placeholder="Email" required name="Email">
            <input class="w3-input" type="text" placeholder="Message" required name="Message"><br>
            <button class="w3-button w3-black" type="submit">SEND</button>
        </form>
            <br>
        <img src="./img/map.JPG" class="w3-image" style="width:50%">
        <p class="w3-center w3-padding-64">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank">w3.css</a></p>
    </div>


</body>
</html>
