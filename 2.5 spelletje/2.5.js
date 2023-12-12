const gameArea = document.getElementById('game-area');
const startButton = document.getElementById('start-button');

let startTime, endTime;

function getRandomTime() {
    return Math.floor(Math.random() * 10000) + 1; // Geeft een willekeurige tijd tussen 1 en 10000 milliseconden
}

function startGame() {
    startButton.style.display = 'none';
    gameArea.style.backgroundColor = 'red';

    const delayTime = getRandomTime();
    setTimeout(() => {
        gameArea.style.backgroundColor = 'green';
        startTime = new Date();
    }, delayTime);
}

gameArea.addEventListener('click', function () {
    endTime = new Date();
    if (gameArea.style.backgroundColor === 'green') {
        const reactionTime = endTime - startTime;
        alert(`Je reactietijd was: ${reactionTime} milliseconden`);
        startButton.style.display = 'block';
    } else {
        alert('Wacht tot het scherm groen wordt!');
    }
});

startButton.addEventListener('click', startGame);