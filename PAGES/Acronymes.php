<?php 
include('../INC/Fonction.php');

$acronymes = get_acronymes();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acronymes</title>
</head>
<body>
    <header>
        <h1>Acronymes</h1>
    </header>
    <main>
        <?php foreach ($acronymes as $row) {?>
            <div>
                <h2><?php echo $row['Acronyme']; ?></h2>
                <p><?php echo $row['Definition']; ?></p>
            </div>
       <?php  }?>
    </main>
</body>
</html>