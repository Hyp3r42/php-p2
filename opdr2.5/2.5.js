const computerChoice = document.getElementById('computerChoice');
const playerChoice = document.getElementById('playerChoice');
const resultOutput = document.getElementById('resultOutput');

const possibleChoices = document.querySelectorAll('button');

let player = '';
let computer = '';
let result = '';

// Stap 5 – EventListener
possibleChoices.forEach(choice => {
    choice.addEventListener('click', () => {
        player = choice.id;
        playerChoice.innerHTML = player;
        generateComputerChoice();
        getResult();
    });
});

// Stap 6 – generateComputerChoice()
function generateComputerChoice() {
    const randomNum = Math.floor(Math.random() * 3) + 1;

    if (randomNum === 1) computer = 'rock';
    else if (randomNum === 2) computer = 'paper';
    else if (randomNum === 3) computer = 'scissors';

    computerChoice.innerHTML = computer;
}

// Stap 7 – getResult()
function getResult() {
    if (computer === player) result = 'gelijkspel';
    else if (
        (computer === 'rock' && player === 'paper') ||
        (computer === 'paper' && player === 'scissors') ||
        (computer === 'scissors' && player === 'rock')
    ) {
        result = 'je hebt gewonnen!';
    } else {
        result = 'je hebt verloren!';
    }

    resultOutput.innerHTML = result;
}