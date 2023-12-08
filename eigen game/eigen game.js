const board = document.getElementById('board');
const cells = [];

// Create the board
for (let i = 0; i < 3; i++) {
    for (let j = 0; j < 3; j++) {
        const cell = document.createElement('div');
        cell.classList.add('cell');
        cell.dataset.row = i;
        cell.dataset.col = j;
        cell.addEventListener('click', cellClick);
        board.appendChild(cell);
        cells.push(cell);
    }
}

let currentPlayer = 'X';

function cellClick() {
    if (this.textContent === '') {
        this.textContent = currentPlayer;
        checkWinner();
        currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
    }
}

function checkWinner() {
    const winningCombinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
        [0, 4, 8], [2, 4, 6] // Diagonals
    ];

    for (const combination of winningCombinations) {
        const [a, b, c] = combination;
        if (cells[a].textContent && cells[a].textContent === cells[b].textContent && cells[a].textContent === cells[c].textContent) {
            alert(`Player ${cells[a].textContent} wins!`);
            resetBoard();
            return;
        }
    }

    if (cells.every(cell => cell.textContent !== '')) {
        alert("It's a draw!");
        resetBoard();
    }
}

function resetBoard() {
    cells.forEach(cell => {
        cell.textContent = '';
    });
    currentPlayer = 'X';
}