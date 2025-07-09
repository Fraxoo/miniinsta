<?php


?>
<!DOCTYPE html>


<head>
    <title>Mini-Insta_bleu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />


</head>

<body>

    <main>

        <div class="try">

            <form method="post" action="upload.php" enctype="multipart/form-data">

                <input type="text" name="utilisateur" placeholder="votre nom :" required>

                <input type="file" id="photo" name="photo" accept="image/*" style="display:none;">
                <label for="photo">
                    <img src="images/plus.png" alt="Ajouter une photo" style="cursor:pointer; width:60px;">
                </label>

                <input id="submit" type="submit" value="envoyer" style="display: none;">
                <label for="submit">
                    <img src="images/arrow.png" alt="Envoyer" style="cursor: pointer;width:45px;">
                </label>

            </form>

        <?php 
            $date = date("d-m-Y");
            $utilisateur = $_POST["utilisateur"];
            $photos = $_FILES["photo"]["name"];
            $file_name = $utilisateur ."-". $date ."-" .$photos;
            $chemin_tmp = $_FILES["photo"]["tmp_name"];
            $upload = move_uploaded_file($chemin_tmp,"photos/".$file_name);

            if($upload){
                echo "fichier envoyer";
            }else{
                echo "erreur veuillez reesayer";
            }
        ?>

        </div>

        <div class="retour">
            <a href="index.php">Retour a l'acceuil</a>
        </div>

    </main>

</body>