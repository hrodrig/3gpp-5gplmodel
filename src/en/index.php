<?php include_once '../config.php' ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Home - Path loss</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo $GLOBALS['APP_ROOT'] ?>/css/formas.css" rel="stylesheet" type="text/css">
        <meta name="keywords" content="5G,frequency,band,spectrum">
        <meta name="description" content="5G frequency band pathloss calculator">

    </head>

    <body>
        <div class="container">
            <?php include($GLOBALS['SCRIPT_ROOT']."/en/forms/header.php"); ?>
            <br>
            <h3><a id="hdr_calc"></a>Path loss attenuation calculator for 5G frequencies</h3>
            <br>

        </div>
        <form class="container" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Scenario</label>
                <select class="form-control col-sm-2" name="txt_sce" id="txt_sce" onchange="this.form.submit()">
                    <option value="" disabled selected>--Choose scenario--</option>
                    <!--The onchange action will reset de selected option,
                    so it is necessary to add the if($_POST and the
                    echo " selected" lines.-->
                    <option value="opt_RMa"<?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["txt_sce"] == "opt_RMa") {
                        echo " selected";
                    }
                    ?>>Rural Macrocell</option>
                    <option value="opt_UMa"<?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["txt_sce"] == "opt_UMa") {
                        echo " selected";
                    }
                    ?>>Urban Macrocell</option>
                    <option value="opt_UMi"<?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["txt_sce"] == "opt_UMi") {
                        echo " selected";
                    }
                    ?>>Urban Microcell</option>
                    <option value="opt_InH"<?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["txt_sce"] == "opt_InH") {
                        echo " selected";
                    }
                    ?>>Indoor-Office</option>

                </select>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txt_sce"])) {
            $scenario = $_POST["txt_sce"];
            switch ($scenario) {
                default:
                case "opt_RMa":
                    include $GLOBALS['SCRIPT_ROOT']."/en/forms/RMa.php";
                    break;
                case "opt_UMa":
                    include $GLOBALS['SCRIPT_ROOT']."/en/forms/UMa.php";
                    break;
                case "opt_UMi":
                    include $GLOBALS['SCRIPT_ROOT']."/en/forms/UMi.php";
                    break;
                case "opt_InH":
                    include $GLOBALS['SCRIPT_ROOT']."/en/forms/InH.php";
                    break;
            }
        }
        ?>
        <br>
        <?php include($GLOBALS['SCRIPT_ROOT']."/en/forms/footer.php"); ?>
    </body>
</html>