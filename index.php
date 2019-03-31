<?php
/**
 * Created by PhpStorm.
 * User: Tom Cedric Gottschlich
 * Date: 30.03.2019
 * Time: 11:29
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
        <div class="container text-center">
            <h3>This is my PHP & Bootstrap gallery solution</h3>
            <div class="container">
                <div class="row">

                    <?php

                    $pfad = "gallery/";             //Der Pfad!
                    $verz = opendir($pfad);         //Öffnet den Pfad!

                    /*
                    * @description: Liest das Verzeichnis aus!
                    */
                    while (false !== ($file = readdir($verz)))
                    {
                        if (dirname($pfad.$file)!="dir")
                        {
                            if ($file != "." && $file != "..") {
                                ?>
                    <div class="col-sm">
                        <div id="accordion">
                            <div class="card" style="">
                                <img class="card-img-top" src="<?php echo $pfad . '/' . $file . '/1.jpg' ?>" alt="Card image cap">
                                <div class="card-body">
                                    <a href="gallery.php?gallery=<?php echo $file; ?>" class="btn btn-outline-info btn-sm">Album "<?php echo $file; ?>" öffnen!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
