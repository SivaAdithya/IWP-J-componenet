<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true){
    header("location: lohin_1.php", TRUE, 302);
    die();
  }
?>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            transition: background-color .5s;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #6002EE;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #E1BEE7;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 20px;
            }

            .sidenav a {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="videos.html">Videos</a>
        <a href="articles.html">Articles</a>
        <a href="quiz.html">Quiz</a>
        <a href="faq.html">FAQ</a>
        <a href="contact1.html">Contact Us</a>
        <a href="passreset.php">Change password</a>
        <a href="logout.php">Log Out</a>
    </div>

    <div id="main">
        <h2>Lorem Ipsum</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis cumque sint maxime eius minus praesentium!
            Ullam voluptas quidem blanditiis doloremque alias recusandae porro laborum! Numquam ea quisquam velit nulla
            ullam!</p>
        <span style="font-size:30px;cursor:pointer;" onmouseover="this.style.color='#cb4fd6'" onclick="openNav()">Let's get started</span>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "210px";
            document.getElementById("main").style.marginLeft = "210px";
            document.body.style.backgroundColor = "#CFD8DC";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.body.style.backgroundColor = "#CFD8DC";
        }
    </script>

</body>

</html>