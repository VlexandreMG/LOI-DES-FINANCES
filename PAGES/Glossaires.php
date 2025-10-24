<?php 
include('../INC/Fonction.php');

$glossaire = get_glossaire();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glossaires</title>
</head>
<body>
<header>
    <h1>Glossaires</h1>
</header>
<main>
    <?php foreach ($glossaire as $row) {?>
        <div>
            <h2><?php echo $row['terme'];?></h2>
            <p><?php echo $row['definition'];?></p>
        </div>
    <?php }?>
</main>
    
</body>
</html>