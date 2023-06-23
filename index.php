<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/Style.css">
    <title>Projet_Hébergeur_Image</title>
</head>
<body>
    <header>

        <h1>Hébergeur d'image</h1>

    </header>
    <div>

        <h2>Choisissez votre image :</h2>

    </div>
    <?php
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        if ($_FILES['image']['size'] <= 3000000) {

            $informationImage   = pathinfo($_FILES['image']['name']);
            $extensionImage     = $informationImage['extension'];
            $extensionArray     = array('png', 'gif', 'jpg', 'jpeg');
            $retour = copy($_FILES['image']['tmp_name'], $_FILES['image']['name']);
        }

        if (in_array($extensionImage, $extensionArray)) {

            $adress = 'upload/' . time() . rand() . rand();

            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . time() .
                basename($_FILES['image']['name']));
        }
        if ($retour) {

            echo '<img src="' . $_FILES['image']['name'] . '">';
        }
    }
    ?>
    <form action="index.php" method="post" enctype="multipart/form-data" class="parcourir">

        <input type="file" name="image" /><br /><br />
        <button type="submit" name="envoyer">Envoyer</button>
    </form>
</body>
</html>