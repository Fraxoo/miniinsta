<?php
function lire_dossier()
{
    $file_names = [];

    $files_dir = opendir("photos");

    do {
        $file_name = readdir($files_dir);
        if ($file_name && $file_name != "." && $file_name != ".." && $file_name != "/") {
            $file_names[] = $file_name;
        }
    } while ($file_name);
    return ($file_names);
}

?>
<!DOCTYPE html>


<head>
    <title>Mini-InstaV2</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

    <main>


        <div class="gallery">

            <?php
            $photos = lire_dossier();
            foreach ($photos as $photo):
            ?>

                <?php
                    $divise = explode("-", $photo);
                    $nom = $divise[0];
                    $jour = $divise[1];
                    $mois = $divise[2];
                    $year = $divise[3];
                ?>

                <div class="post">
                    <img src="photos/<?php echo $photo ?>" alt="">
                    <div class="para">
                        <p class="big"><?php echo $nom ?></p>
                        <p class="petit"><?php echo $jour . "/" . $mois . "/" . $year ?></p>
                    </div>

                </div>

            <?php endforeach ?>

            <div class="add">
                <a href="upload.php"><img src="images/plus.png" alt=""></a>
            </div>

        </div>

    </main>



</body>