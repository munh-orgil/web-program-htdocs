<html>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body style="background-color:#34b9b1;">
    <div
        style="background-color:white;margin-left:30%;padding:30px 20px;;width:40%;margin-top:10%;border-width:0;border-style:solid;border-radius:10px;border-color:grey;">
        <?php
        $dirName = basename(__DIR__);
        $labelName = "Утга хөрвүүлэх";
        include("..\\.all_projects.php")
            ?>
        <div class="row">
            <div class="col-sm-12">
                <hr style="height:0.5px;width:100%;border-width:0;background-color:rgb(200,200,200)">
            </div>
        </div>

        <form action="index.php" method="post">
            <div class="row">
                <div class="col-sm-6" class="form-group">
                    <label for="inVal">Хувиргах утга:</label>
                    <input type="number" step=any class="form-control" id="inVal" name="in" value=<?php
                    if (isset($_POST["in"])) {
                        echo $_POST["in"];
                    } else {
                        echo "";
                    }
                    ?>>
                </div>

                <div class="col-sm-6" class="form-group">
                    <label for="typeDropDown">Хувиргах төрөл:</label>
                    <div class="dropdown" id="typeDropDown">
                        <?php
                        ?>
                        <select class="btn btn-default dropdown-toggle" class="dropdown-menu" name="conversionType"
                            style="width:100%;">
                            <span class="caret"></span>
                            <?php
                            $dropDownItems = ["Инч-СМ", "Бээр-КМ", "Морины хүч – Ватт", "Паунд-грамм", "Баррелийг-литр"];
                            $selectedOptionIndex = 0;
                            if (isset($_POST["conversionType"])) {
                                $selectedOptionIndex = $_POST["conversionType"];
                            }
                            for ($i = 0; $i < count($dropDownItems); $i++) {

                                echo "<option ";
                                if ($i == $selectedOptionIndex) {
                                    echo "selected ";
                                }
                                echo "value='$i'>" . $dropDownItems[$i] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-sm-6" class="form-group">
                    <label for="resVal">Нэгжийн утга:</label>
                    <input type="text" class="form-control" id="resVal" value=<?php
                    $convertValues = [2.54, 1.6, 735.5, 453.6, 159];
                    if (isset($_POST["in"])) {
                        $typeValue = $_POST["conversionType"];
                        $inputValue = $_POST["in"];
                        if ($inputValue == "") {
                            $inputValue = 0;
                        }
                        echo $y = $inputValue * $convertValues[$typeValue];
                    }
                    ?>>
                </div>
            </div>

            <hr style="height:0.5px;width:100%;border-width:0;background-color:rgb(200,200,200)">
            <div class="row">
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary" value="Хөрвүүлэх">
                </div>
                <div class="col-sm-2">
                    <input type="reset" class="btn btn-danger" value="Арилгах">
                </div>
            </div>
        </form>
    </div>
</body>

</html>