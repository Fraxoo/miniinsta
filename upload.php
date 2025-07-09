<?php
?>

<!DOCTYPE html>

<head>
    <title>Mini-Insta</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

    <main>

        <div class="all">

            <div class="mini">
                <h1>MINI Insta</h1>
            </div>

            <div class="upload">

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="nom" placeholder="votre nom :" required>
                    <input type="file" name="photo">
                    <input type="submit" value="envoyer">
                </form>

                <?php
                $date = date("d-m-Y");
                $nom = $_POST["nom"];
                $photo = $_FILES["photo"]["name"];
                $file_name = $nom . "-" . $date . "-" . $photo;
                $chemin_tmp = $_FILES["photo"]["tmp_name"];
                $upload = move_uploaded_file($chemin_tmp, "photos/" . $file_name);
                ?>
                <?php if ($upload !== false) : ?>
                    <p>Upload reussi!</p>
                    <img src="photos/<?php echo $file_name ?>">
                <?php else : ?>
                    <p>Veuillez entrer une image</p>
                <?php endif ?>



            </div>

            <div class="retour">
                <a href="index.php">Retour a l'acceuil</a>
            </div>

        </div>




    </main>






</body>