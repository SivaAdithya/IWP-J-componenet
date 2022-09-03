<html>
    <head>
        <style>
            #main {
            transition: margin-left .5s;
            padding: 16px;
        }
        body {
            font-family: 'Poppins', sans-serif;
            transition: background-color .5s;
            background-color: aquamarine;
        }
        </style>
    </head>
    <body>
        <div id="main">
        <?php
        $conn = mysqli_connect("localhost","root","","jbdataabase");
        $ans = array();
        $ans[0] = $_GET['question-1-answers'];
        $ans[1] = $_GET['question-2-answers'];
        $ans[2] = $_GET['question-3-answers'];
        $ans[3] = $_GET['question-4-answers'];
        $ans[4] = $_GET['question-5-answers'];
        $x = mysqli_query($conn,"select Answer from english");
        $score = 0;
        for($i=0;$i<5;$i++) {
            $row = mysqli_fetch_array($x);
            if($row[0] == $ans[$i])
                $score++;
            }
        echo "Your score is $score";        
        ?>
        </div>
        <a href="quiz.html">Quiz Page</a>
        <br>
        <a href="videos_articles.php">Home</a>
    </body>
</html>