<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE-edge" />
  <meta name="viewport" content="width=device-width, initial-scale 1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="style2.css" />
  <script src="script.js" defer></script>
  <title>GameHub</title>
<link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
</head>

<body>
  <?php
  include '../header.php';
  ?>
  <div class="container">
      <div id="options-container"></div>
      <div id="letter-container" class="letter-container hide"></div>
      <div id="user-input-section"></div>
      <canvas id="canvas"></canvas>
      <div id="new-game-container" class="new-game-popup hide">
        <div id="result-text"></div>
        <button id="new-game-button">New Game</button>
      </div>
    </div>
    <!-- Script -->
    <script src="script.js"></script>
</body>

</html>