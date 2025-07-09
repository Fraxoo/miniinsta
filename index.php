<?php

function lire_dossier()
{
    $file_names = [];
    
        $photos_dir = opendir("photos");

        do {
            $file_name = readdir($photos_dir);
            // Je n'affiche pas les fichiers cachés (commençant par un point) et les répertoires spéciaux "." et ".."
            if ($file_name && $file_name != "." && $file_name != ".." && $file_name != "/") {
                $file_names[] = $file_name; // J'ajoute le nom du fichier à la liste
            }
        } while ($file_name);
        return $file_names;
    
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
            foreach ($photos as $photo) : ?>
        <div class="post">  
            
            <?php 
                $divise = explode("-",$photo);
                
                $autheur = $divise[0];
                $jour = $divise[1];
                $mois = $divise[2];
                $year = $divise[3];
            ?> 


            <img src="photos/<?php echo $photo ?>" alt="">
            <p class="big"><?php echo $autheur ?></p>
            <p class="petit"><?php echo $jour."/".$mois."/".$year ?></p>
            
            
            <?php endforeach; ?>
        </div>
            
        
        <div class="send">
            <a href="upload.php"><img src="images/plus.png" alt=""></a>
        </div>
    </div>

</main>



</body>



