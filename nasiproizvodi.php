<?php
require_once "baza.php";

$rezultat = $baza->query("SELECT * FROM proizvodi");

$proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);


if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROIZVODI</title>
</head>
<body>
  <div>

   <a href="nasiproizvodi.php">Glavna</a>
    <?php if(!isset($_SESSION['ulogovan'])): ?>
    <a href="ulogujme.php">Log In</a>
   <?php else :  ?>
    <a href="logout.php">Log Out</a>
   <?php endif; ?>

  </div>


   <?php foreach($proizvodi as $proizvod) : ?>
   <h1><?= $proizvod['ime']; ?></h1>
   <p?><?= $proizvod['opis']; ?> </p>
   <p?>Cena proizvoda: <?= $proizvod['cena']; ?> </p>
   <p?>Kolicina: <?= $proizvod['kolicina']; ?> </p>

    <?php if($proizvod['kolicina'] == 0): ?>
    <p>Nema na stanju</p>
    <?php else : ?>
        <p>Ima na stanju</p>
    <?php endif; ?>
    <a href="pogledajproizvod.php?id=<?=$proizvod['id']?>">Pogledaj proizvod</a>

   <?php endforeach; ?> 
</body>
</html>