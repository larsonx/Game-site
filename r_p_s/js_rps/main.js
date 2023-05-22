const playerHand = document.getElementById("playerHand");
const computerHand = document.getElementById("pcHand");
const result = document.getElementById("result");
const score = document.getElementById("score");
const team = document.getElementById("team");
const teamCpu = document.getElementById("teamCpu");
const restart = document.getElementById("Restart");
let gamePlayed = 0;
let scorePlayer = 0;
let scoreComputer = 0;
// computerhand bestaan uit 3 verschillende keuzes
const array = [
  ["0", "<img src='../img/steen1.png'>"],
  ["1", "<img src='../img/papier.png'>"],
  ["2", "<img src='../img/schaar.png' class='schaar'>"],
];
// hier wordt de computerhand gekozen en erin gezet
const randomHand = () => {
  const rIndex = Math.floor(Math.random() * array.length);
  hand = array[rIndex];
  computerHand.innerHTML = hand[1];
  return hand;
};
// hier wordt de keuze van de speler opgehaald
//ik heb button uit html gehaald. vevolgens addEventListener toegevoegd aan de button gekopld uit array dat het een steen is.
papier.addEventListener("click", () => {
  const hand = randomHand();
  const handPlayer = array[1];
  playerHand.innerHTML = handPlayer[1];
  winner(handPlayer, hand);
});

steen.addEventListener("click", () => {
  const hand = randomHand();
  const handPlayer = array[0];
  playerHand.innerHTML = handPlayer[1];
  winner(handPlayer, hand);
});

schaar.addEventListener("click", () => {
  const hand = randomHand();
  const handPlayer = array[2];
  playerHand.innerHTML = handPlayer[1];
  winner(handPlayer, hand);
});

restart.addEventListener("click", () => {
  gamePlayed = 0;
  scorePlayer = 0;
  scoreComputer = 0;
  score.innerHTML = "<br>" + scorePlayer + " - " + scoreComputer;
  team.style.color = "white";
  teamCpu.style.color = "white";
  team.style["textShadow"] = "none";
  teamCpu.style["textShadow"] = "none";
  return "white";
});
// hier wordt de winnaar bepaald
//winner functie wordt aangeroepen in de eventlistener zodat elke keer als er op een button wordt geklikt mijn functie bepaald de uitslag
function winner(handPlayer, hand) {
  if (handPlayer[0] === hand[0]) {
    result.innerHTML = "Gelijkspel";
    gamePlayed--;
  } else if (
    (handPlayer[0] === "0" && hand[0] === "2") ||
    (handPlayer[0] === "1" && hand[0] === "0") ||
    (handPlayer[0] === "2" && hand[0] === "1")
  ) {
    result.innerHTML = "Je hebt gewonnen";
  } else {
    result.innerHTML = "Je hebt verloren";
  }
  scoreCounter();
  streak(ultra); // Pass the ultra function as a parameter
  gamePlayed++;
  console.log(gamePlayed);
  endGame();
}

// here comes the ultra function
function ultra() {
  if (scorePlayer === 10 && scoreComputer === 0) {
    alert("Je hebt 10 keer gewonnen!! Je hebt een ULTRA-streak!");
    team.style.color = gradient();
    return;
  } else if (scoreComputer === 10 && scorePlayer === 0) {
    alert("CPU heeft 10 keer gewonnen!! CPU heeft een ULTRA-streak!");
    teamCpu.style.color = gradient();
    return;
  }
}

// hier wordt de score bijgehouden
//ik heb een variabele aangemaakt voor de score en deze wordt bij elke keer dat er een winnaar is bijgevoegd
// eerst functei aanngemakt, vervolgens elke keer als er uitslag bekend is. en dat is als er in html gewonnen of verloren getoond wordt. komt een functie aan.
// met anderen worden score++ is gekopeld aan resylt.innerHTML.
function scoreCounter() {
  if (result.innerHTML === "Je hebt gewonnen") {
    scorePlayer++;
  } else if (result.innerHTML === "Je hebt verloren") {
    scoreComputer++;
  }
  score.innerHTML = "<br>" + scorePlayer + " - " + scoreComputer;
}

function streak(ultra) {
  if (scorePlayer >= 10 && scoreComputer === 0) {
    alert(
      "WOW Je hebt 10 keer achterelkaar gewonnen! Je hebt een ULTRA-streak!"
    );
    team.style.color = "purple";
    team.style["textShadow"] =
      "3px 2px 2px purple, 3px 2px 4em blue, 0 0 0.10em purple";
  } else if (scoreComputer >= 10 && scorePlayer === 0) {
    alert(
      "WOW CPU heeft 10 keer achterelkaar gewonnen! CPU heeft een ULTRA-streak!"
    );
    teamCpu.style.color = "purple";
    teamCpu.style["textShadow"] =
      "3px 2px 2px purple, 3px 2px 4em blue, 0 0 0.10em purple";
  } else if (scorePlayer >= 5 && scoreComputer === 0) {
    alert("WOW Je hebt 5 keer achterelkaar gewonnen! Je hebt een MEGA-streak!");
    team.style.color = "red";
    team.style["textShadow"] =
      "3px 2px 2px red, 3px 2px 4em blue, 0 0 0.10em red";
  } else if (scoreComputer >= 5 && scorePlayer === 0) {
    alert(
      "WOW CPU heeft 5 keer achterelkaar gewonnen! CPU heeft een MEGA-streak!"
    );
    teamCpu.style.color = "red";
    teamCpu.style["textShadow"] =
      "3px 2px 2px red, 3px 2px 4em blue, 0 0 0.10em red";
  } else if (scorePlayer >= 3 && scoreComputer === 0) {
    alert("Je hebt 3 keer gewonnen. Je hebt een streak!");
    team.style.color = "orange";
    team.style["textShadow"] =
      "3px 2px 2px orange, 3px 2px 4em blue, 0 0 0.10em orange";
  } else if (scoreComputer >= 3 && scorePlayer === 0) {
    alert("CPU heeft 3 keer gewonnen. CPU heeft een streak!");
    teamCpu.style.color = "orange";
    teamCpu.style["textShadow"] =
      "3px 2px 2px orange, 3px 2px 4em blue, 0 0 0.10em orange";
  } else {
    team.style.color = "white";
    teamCpu.style.color = "white";
    team.style["textShadow"] = "none";
    teamCpu.style["textShadow"] = "none";
  }
}

function gradient() {
  let letters = "0123456789ABCDEF";
  let color = "#";
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function endGame() {
  if (gamePlayed == 11) {
    scorePlayer = 0;
    scoreComputer = 0;
    score.innerHTML = "<br>" + scorePlayer + " - " + scoreComputer;
    team.style.color = "white";
    teamCpu.style.color = "white";
    team.style["textShadow"] = "none";
    teamCpu.style["textShadow"] = "none";
    gamePlayed = 0;
    return "white";
  }
}
