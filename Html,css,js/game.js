const squares = document.querySelectorAll('.square');
const message = document.getElementById('message');
const resetButton = document.getElementById('reset');

let currentPlayer = 'X';
let moves = 0;
let gameWon = false;

const winningCombos = [
	[0, 1, 2],
	[3, 4, 5],
	[6, 7, 8],
	[0, 3, 6],
	[1, 4, 7],
	[2, 5, 8],
	[0, 4, 8],
	[2, 4, 6]
];

function checkForWin() {
	for (let i = 0; i < winningCombos.length; i++) {
		const combo = winningCombos[i];
		if (
			squares[combo[0]].innerText === currentPlayer &&
			squares[combo[1]].innerText === currentPlayer &&
			squares[combo[2]].innerText === currentPlayer
		) {
			gameWon = true;
			message.innerText = `${currentPlayer} wins!`;
			break;
		}
	}
	if (moves === 9 && !gameWon) {
		message.innerText = "It's a tie!";
	}
}

function handleClick() {
	if (!gameWon && this.innerText === '') {
		this.innerText = currentPlayer;
		moves++;
		checkForWin();
		if (!gameWon) {
			currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
			message.innerText = `It's ${currentPlayer}'s turn`;
		}
	}
}

function reset() {
	for (let i = 0; i < squares.length; i++) {
		squares[i].innerText = '';
	}
	currentPlayer = 'X';
	moves = 0;
	gameWon = false;
	message.innerText = `It's ${currentPlayer}'s turn`;
}

for (let i = 0; i < squares.length; i++) {
	squares[i].addEventListener('click', handleClick);
}

resetButton.addEventListener('click', reset);

message.innerText = `It's ${currentPlayer}'s turn`;

