<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="dino.css" />
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&family=Teko:wght@500&family=Ubuntu+Condensed&display=swap"
    rel="stylesheet" />
  <title>Document</title>
</head>

<body>
<?php
  include 'header.php';
  ?>
  <div class="game">
    <img id="character" src="../N-N-N-N/img/dino copy.png" />
    <img id="block" src="../N-N-N-N/img/PngItem_1077755.png" />
  </div>
  <p>Score <span id="scoreSpan"></span></p>
  <script src="../N-N-N-N/dino/js/main.js"></script>
</body>

</html>