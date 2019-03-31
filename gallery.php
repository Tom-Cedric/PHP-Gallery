<?php
/**
 * Created by PhpStorm.
 * User: Tom Cedric Gottschlich
 * Date: 30.03.2019
 * Time: 11:37
 */

?>
<html>
<head>

    <meta charset="UTF-8">

    <title>PHPGallerySolution</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container text-center" style="margin-top: 5em; margin-bottom: 5em;">
    <div id="accordion">
        <?php

        //Abfrage, ob ein Album ausgewählt wurde.
        if (isset($_GET['gallery'])) {

            $year = $_GET['gallery'];

            $pfad = "gallery/" . $year;         //Der Pfad!

            //Abfrage, ob ein Pfad so existiert.
            if (file_exists($pfad)) {

                $verz = opendir($pfad);         //Öffnet den Pfad!

                /*
                 * @description: Liest das Verzeichnis aus!
                 */
                while (false !== ($file = readdir($verz))) {
                    if (dirname($pfad . $file) != "dir") {
                        if ($file != "." && $file != ".." && $file != "1.jpg") {
                            ?>
                            <div class="card">
                                <div class="card-header" id="Gallery_<?php echo $file; ?>">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapse<?php echo $file; ?>" aria-expanded="true"
                                                aria-controls="collapse<?php echo $file; ?>">
                                            <img src="<?php echo $pfad . '/' . $file . '/1.jpg' ?>"
                                                 class="rounded mx-auto d-block" style="height: 5em; width: 8em;"
                                                 alt="">
                                            <h6 style="color: #000000; text-decoration: none;"><?php echo $file; ?></h6>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse<?php echo $file; ?>" class="collapse"
                                     aria-labelledby="<?php echo $file; ?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="row">
                                                <?php
                                                $files = scandir('gallery/' . $year . '/' . $file);
                                                $filescount = count($files) - 2;
                                                /*
                                                * @description: Hier wird die gesamte Galerie geladen!
                                                */
                                                for ($i_index = 1; $i_index <= $filescount; $i_index++) {
                                                    ?>
                                                    <div class="col-lg-2 col-md-2 col-xs-3 thumb container-side">
                                                        <a class="thumbnail" href="#" data-image-id=""
                                                           data-toggle="modal" data-title=""
                                                           data-image="<?php echo $pfad . '/' . $file; ?>/<?php echo $i_index; ?>.jpg"
                                                           data-target="#image-gallery">
                                                            <img class="img-thumbnail"
                                                                 src="<?php echo $pfad . '/' . $file; ?>/<?php echo $i_index; ?>.jpg"
                                                                 alt="Bild <?php echo $i_index; ?>">
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php
                        }
                    }
                }
            } else {

                header('Location: index.php');
                exit();

            }
        } else {

            header('Location: index.php');
            exit();

        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>
