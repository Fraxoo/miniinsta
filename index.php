<?php

function lire_dossier()
{
    $photos = [];
    try {
        $photos_dir = opendir("photos");

        do {
            $file_name = readdir($photos_dir);
            // Je n'affiche pas les fichiers cachés (commençant par un point) et les répertoires spéciaux "." et ".."
            if ($file_name && $file_name != "." && $file_name != ".." && $file_name != "/") {
                $photos[] = $file_name; // J'ajoute le nom du fichier à la liste
            }
        } while ($file_name);
    } catch (\Throwable $th) {
        throw $th;
    }
    return $photos;
}



?>





<!DOCTYPE html>
<head>
    <title>Mini-Insta</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>




<body>


<main>

   
    <div class="gallery">
        <?php
        $photos = lire_dossier();
            foreach($photos as $photo): ?>
            <div class="post">
            <img src="photos/<?php echo $photo ?>">
            <?php echo $photo ?>
            </div>
            <?php endforeach; ?>
    </div>

</main>

<footer>

    <div class="tout">
        
        <form method="post" action="index.php" enctype="multipart/form-data">

            <img src="images/gallery.png" style="width: 60px;">

            <input type="file" id="photo" name="photo" accept="image/*" style="display:none;">
            <label for="photo">
                <img src="images/plus.png" alt="Ajouter une photo" style="cursor:pointer; width:60px;">
            </label>

            <input id="submit"type="submit"  value="envoyer" style="display: none;">
            <label for="submit">
                <img src="images/arrow.png" alt="Envoyer" style="cursor: pointer;width:45px;">
            </label>

        </form>

        <?php $save = $_FILES["photo"]["tmp_name"];
        move_uploaded_file($save,"photos/".$_FILES["photo"]["name"]); ?>
    </div>

</footer>

</body>



