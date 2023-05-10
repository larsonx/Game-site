<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE-edge" />
  <meta name="viewport" content="width=device-width, initial-scale 1.0" />
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
  <title>GameHub</title>
</head>

<body>
<?php
include 'header.php';
  ?>
<div class="mainText"> 
  <h1 class="h1">Choose your game </h1>
</div>
<div class="grid-container">
  <div class="grid-item"> 
 <div class = "card">
    <img src="./img/dino.png" alt="" >
    <div class="card-content">
      <h2>
        Dino Run
      </h2>
      <p>
      Dino Run is a fast-paced runner game. You, a small raptor, must outrun the "Wall of Doom"
      </p>
      <a href="#" class="button">
        Play now
      </a>
    </div>
  </div>
  </div>
  <div class="grid-item">
    <div class = "card">
    <img src="./img/steen.png" alt="" >
    <div class="card-content">
      <h2>
        Rock Paper Scissors
      </h2>
      <p>
        A classic two-person game. Players start each round by saying, “rock, paper, scissors, shoot!” On “shoot,” each player holds out their fist for rock, flat hand for paper, or their index and middle finger for scissors.
      </p>
      <a href="#" class="button">
        Play now
      </a>
    </div></div>
  <div class="grid-item">
    <div class = "card">
    <img src="./img/tetris.png" alt="" >
    <div class="card-content">
      <h2>
        Tetris
      </h2>
      <p>
        In Tetris, players complete lines by moving differently shaped pieces (tetrominoes), which descend onto the playing field. The completed lines disappear and grant the player points
      </p>
      <a href="tetris/tetris.php" class="button">
        Play now
      </a>
    </div></div>
  <div class="grid-item">
    <div class = "card">
    <img src="./img/hangman.png" alt="" >
    <div class="card-content">
      <h2>
        Hangman
      </h2>
      <p>
        a word game in which one player has to guess a word that the other player has thought of, by guessing the letters in it.
      </p>
      <a href="galgje/index.php" class="button">
        Play now
      </a>
    </div>
  </div>
</div>
</body>
</html>