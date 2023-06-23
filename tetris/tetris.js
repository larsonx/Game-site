document.addEventListener("DOMContentLoaded", () => {
  const grid = document.querySelector(".grid-t");
  let squares = Array.from(document.querySelectorAll(".grid-t div"));
  const scoreDisplay = document.querySelector("#score");
  const startBtn = document.querySelector("#start-button");
  const width = 10;
  let nextRandom = 0;
  let timerId;
  let score = 0;
  let numClears = 0;
  const colors = ["orange", "red", "purple", "green", "blue"];

  //The Tetrominoes
  const lTetromino = [
    [1, width + 1, width * 2 + 1, 2],
    [width, width + 1, width + 2, width * 2 + 2],
    [1, width + 1, width * 2 + 1, width * 2],
    [width, width * 2, width * 2 + 1, width * 2 + 2],
  ];

  const zTetromino = [
    [0, width, width + 1, width * 2 + 1],
    [width + 1, width + 2, width * 2, width * 2 + 1],
    [0, width, width + 1, width * 2 + 1],
    [width + 1, width + 2, width * 2, width * 2 + 1],
  ];

  const tTetromino = [
    [1, width, width + 1, width + 2],
    [1, width + 1, width + 2, width * 2 + 1],
    [width, width + 1, width + 2, width * 2 + 1],
    [1, width, width + 1, width * 2 + 1],
  ];

  const oTetromino = [
    [0, 1, width, width + 1],
    [0, 1, width, width + 1],
    [0, 1, width, width + 1],
    [0, 1, width, width + 1],
  ];

  const iTetromino = [
    [1, width + 1, width * 2 + 1, width * 3 + 1],
    [width, width + 1, width + 2, width + 3],
    [1, width + 1, width * 2 + 1, width * 3 + 1],
    [width, width + 1, width + 2, width + 3],
  ];

  const theTetrominoes = [
    lTetromino,
    zTetromino,
    tTetromino,
    oTetromino,
    iTetromino,
  ];

  let currentPosition = 4;
  let currentRotation = 0;

  console.log(theTetrominoes[0][0]);

  //Selecteert de Tetromino + standaard positie
  let random = Math.floor(Math.random() * theTetrominoes.length);
  let current = theTetrominoes[random][currentRotation];

  //tekent de tetromino
  function draw() {
    current.forEach((index) => {
      squares[currentPosition + index].classList.add("tetromino");
      squares[currentPosition + index].style.backgroundColor = colors[random];
    });
  }

  //verwijdert tetromino
  function undraw() {
    current.forEach((index) => {
      squares[currentPosition + index].classList.remove("tetromino");
      squares[currentPosition + index].style.backgroundColor = "";
    });
  }

  //Keycode functies
  function controlKeyDown(e) {
    if (e.keyCode === 37) {
      moveLeft();
    } else if (e.keyCode === 39) {
      moveRight();
    } else if (e.keyCode == 40) {
      moveDown();
    }
  }

  function controlKeyUp(e) {
    if (e.keyCode === 38) {
      rotate();
    }
  }

  //move down functie
  function moveDown() {
    if (
      !current.some((index) =>
        squares[currentPosition + index + width].classList.contains("taken")
      )
    ) {
      undraw();
      currentPosition += width;
      draw();
    } else {
      freeze();
    }
  }

  //freeze functie
  function freeze() {
    if (
      current.some((index) =>
        squares[currentPosition + index + width].classList.contains("taken")
      )
    ) {
      current.forEach((index) =>
        squares[currentPosition + index].classList.add("taken")
      );
      //volgend blokje die valt
      random = nextRandom;
      nextRandom = Math.floor(Math.random() * theTetrominoes.length);
      current = theTetrominoes[random][currentRotation];
      currentPosition = 4;
      addScore();
      draw();
      displayShape();
      gameOver();
    }
  }

  //beweegt naar links tenzij er een blokkade is
  function moveLeft() {
    undraw();
    const isAtLeftEdge = current.some(
      (index) => (currentPosition + index) % width === 0
    );
    if (!isAtLeftEdge) currentPosition -= 1;
    if (
      current.some((index) =>
        squares[currentPosition + index].classList.contains("taken")
      )
    ) {
      currentPosition += 1;
    }
    draw();
  }

  //beweegt naar rechts tenzij er een blockade is
  function moveRight() {
    undraw();
    const isAtRightEdge = current.some(
      (index) => (currentPosition + index) % width === width - 1
    );
    if (!isAtRightEdge) currentPosition += 1;
    if (
      current.some((index) =>
        squares[currentPosition + index].classList.contains("taken")
      )
    ) {
      currentPosition -= 1;
    }
    draw();
  }

  ///Rotatie fix zodat de blokjes niet buiten het veld gaan tijdens het roteren
  function isAtRight() {
    return current.some((index) => (currentPosition + index + 1) % width === 0);
  }

  function isAtLeft() {
    return current.some((index) => (currentPosition + index) % width === 0);
  }

  function checkRotatedPosition(P) {
    P = P || currentPosition; // Pakt de huidige positie
    if ((P + 1) % width < 4) {
      //+1 1 because the position index can be 1 less than where the piece is (with how they are indexed).
      if (isAtRight()) {
        //gebruik de echte positie om te checken of het naar rechts is geflipt
        currentPosition += 1; 
        checkRotatedPosition(P); //check again.  Pass position from start, since long block might need to move more.
      }
    } else if (P % width > 5) {
      if (isAtLeft()) {
        currentPosition -= 1;
        checkRotatedPosition(P);
      }
    }
  }

  function rotate() {
    undraw();
    currentRotation++;
    if (currentRotation === current.length) {
    currentRotation = 0;
    }
    current = theTetrominoes[random][currentRotation];
    checkRotatedPosition();
    
    // check voor blok collision
    for (let i = 0; i < current.length; i++) {
    if ((currentPosition + current[i]) % width < 0 ||
    (currentPosition + current[i]) % width >= width ||
    squares[currentPosition + current[i]].classList.contains('taken')) {
    // als een tetromino overlapt met een blokje roteer hem terug
    currentRotation--;
    if (currentRotation < 0) {
    currentRotation = current.length - 1;
    }
    current = theTetrominoes[random][currentRotation];
    checkRotatedPosition();
    break;
    }
    }
    
    draw();
    }
  
  /////////

  //volgende tetromino in the mini-grid
  const displaySquares = document.querySelectorAll(".mini-grid div");
  const displayWidth = 4;
  const displayIndex = 0;

  //Tetrominos zonder rotaties
  const upNextTetrominoes = [
    [1, displayWidth + 1, displayWidth * 2 + 1, 2], //lTetromino
    [0, displayWidth, displayWidth + 1, displayWidth * 2 + 1], //zTetromino
    [1, displayWidth, displayWidth + 1, displayWidth + 2], //tTetromino
    [0, 1, displayWidth, displayWidth + 1], //oTetromino
    [1, displayWidth + 1, displayWidth * 2 + 1, displayWidth * 3 + 1], //iTetromino
  ];

  //mini-grid display
  function displayShape() {
    
    displaySquares.forEach((square) => {
      square.classList.remove("tetromino");
      square.style.backgroundColor = "";
    });
    upNextTetrominoes[nextRandom].forEach((index) => {
      displaySquares[displayIndex + index].classList.add("tetromino");
      displaySquares[displayIndex + index].style.backgroundColor =
        colors[nextRandom];
    });
  }

  //button functionaliteit
  startBtn.addEventListener("click", () => {
    document.addEventListener("keydown", controlKeyDown);
    document.addEventListener("keyup", controlKeyUp);
    if (timerId) {
      clearInterval(timerId);
      timerId = null;
    } else {
      draw();
      timerId = setInterval(moveDown, 1000);
      nextRandom = Math.floor(Math.random() * theTetrominoes.length);
      displayShape();
    }
  });

  //add score
  function addScore() {
    for (let i = 0; i < 199; i += width) {
      const row = [
        i,
        i + 1,
        i + 2,
        i + 3,
        i + 4,
        i + 5,
        i + 6,
        i + 7,
        i + 8,
        i + 9,
      ];

      if (row.every((index) => squares[index].classList.contains("taken"))) {
        score += 10;
        scoreDisplay.innerHTML = score;
        row.forEach((index) => {
          squares[index].classList.remove("taken");
          squares[index].classList.remove("tetromino");
          squares[index].style.backgroundColor = "";
        });
        const squaresRemoved = squares.splice(i, width);
        squares = squaresRemoved.concat(squares);
        squares.forEach((cell) => grid.appendChild(cell));
        numClears++;
        
        if (numClears % 5 === 0) {
          clearInterval(timerId);
          timerId = setInterval(moveDown, 1000 - (numClears / 5) * 125);
        }
      }
    }
  }

  //game over
  function gameOver() {
    if (
      current.some((index) =>
        squares[currentPosition + index].classList.contains("taken")
      )
    ) {
      let OverBtn = document.querySelector("#game-over");
      OverBtn.style.display = "block";
      OverBtn.addEventListener("click", () => {
        location.reload();
      });
      document.removeEventListener("keydown", controlKeyDown);
      document.removeEventListener("keyup", controlKeyUp);
      scoreDisplay.innerHTML = score;
      clearInterval(timerId);
    }
  }
});
//iets met if game over removeclasslists ( om te testen binnen de gameOver functie).