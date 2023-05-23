<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../r_p_s/css_rps/style.css" />
  <link rel="stylesheet" href="../style.css" />
  <script src="../script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik+Vinyl&family=Teko:wght@500&family=Ubuntu+Condensed&display=swap"
    rel="stylesheet" />
</head>

<body>
  <?php
  include '../header2.php';
  ?>
  <div class="gameField">
    <div id="playerHand"></div>
    <div id="pcHand"></div>
  </div>
  <div class="Teams">
    <div id="team">You</div>
    <div id="teamCpu">CPU</div>
  </div>
  <div id="score"></div>
  <div class="resultbox">
    <div id="result"></div>
  </div>
  <div class="btn">
    <button id="steen">Rock</button>
    <button id="papier">Paper</button>
    <button id="schaar">Scissors</button>
    <button id="Restart">Restart</button>
  </div>
  <script src="../r_p_s/js_rps/main.js"></script>
</body>

</html>