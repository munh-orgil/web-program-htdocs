<?php
    $file = fopen("poll.txt", "r");

    $question = fgets($file);
    $resultString = fgets($file);

    $results = explode(",", $resultString);

    $text = "";
    
    if (isset($_POST["choice"])) {
        if (isset($_COOKIE["poll"])) {
            $text = "Дахин санал өгөх боломжгүй";
        } else {
            $text = "";
            $expire = time() + 10;
            setcookie("poll", 1, $expire);
            
            $choice = $_POST["choice"];
            $results[$choice]++;
    
            $resultString = implode(",", $results);
            $fileContent = $question.$resultString;
            file_put_contents("poll.txt", $fileContent);
        }

    }

?>

<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="a.css" rel="stylesheet">
    <body style="background-color:lightgrey;">
        <div class="container" style="background-color:white;width:40%;margin-left:30%;margin-top:10%;border-width:0;border-style:solid;border-radius:10px;">
            <div style="margin-top:20px;margin-bottom:20px;">
                <?php
                    $dirName = basename(__DIR__);
                    $labelName = "САНАЛ АСУУЛГА";
                    include("..\\.all_projects.php")
                ?>
            </div>

            <form action="poll.php" method="POST">
                <label for="options">
                <?php
                    echo $question;
                ?>
                </label>
                <div id="options">
                    <div class="radio">
                        <label><input type="radio" name="choice" value="0"> Тийм </label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="choice" value="1"> Үгүй </label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="choice" value="2"> Мэдэхгүй </label>
                    </div>

                    <div>
                        <input type="submit" class="btn btn-danger" value="Санал өгөх">

                        <?php
                            echo "(Нийт санал:".($results[0] + $results[1] + $results[2]).")";
                        ?>
                    </div>
                </div>

                <?php
                    echo $text;
                ?>
            </form>
        </div>
    </body>
</html>
