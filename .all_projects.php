<div class="row">
    <?php
    $files = scandir("..");
    $fileNames = array();
    foreach ($files as $file) {
        $fileName = basename($file);
        if (isset($fileName[0]) && $fileName[0] != '.') {
            array_push($fileNames, $fileName);
        }
    }
    ?>
    <div class="col-sm-6">
        <h5><?php echo $labelName ?></h5>
    </div>
    <div class="col-sm-6">
        <div style="position:absolute;right:50px;">
            <div class="dropdown">
                <select class="btn btn-primary dropdown-toggle" class="dropdown-menu" style="width:fit-content;"
                    onchange="location = this.value;">
                    <?php
                    $selectedNameIndex = 0;
                    for ($i = 0; $i < count($fileNames); $i++) {
                        if ($fileNames[$i] == $dirName) {
                            $selectedNameIndex = $i;
                            break;
                        }
                    }
                    for ($i = 0; $i < count($fileNames); $i++) {
                        echo "<option ";
                        if ($i == $selectedNameIndex) {
                            echo "selected ";
                        }
                        echo "value='..\\" . $fileNames[$i] . "'>" . $fileNames[$i] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>