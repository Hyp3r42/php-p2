// Variabelen
let balance = 0;
const balanceDisplay = document.getElementById('balance');
const amountInput = document.getElementById('amount');
const depositButton = document.getElementById('deposit');
const withdrawButton = document.getElementById('withdraw');
const transactionsList = document.getElementById('transactions');

// Functie om saldo bij te werken en transacties toe te voegen
function updateBalance(amount, type) {
    const transaction = document.createElement('li');
    transaction.textContent = `${type}: ${amount}`;
    transactionsList.appendChild(transaction);

    if (type === 'Storting') {
        balance += amount;
    } else if (type === 'Opname') {
        balance -= amount;
    }

    balanceDisplay.textContent = balance;
}

// Eventlisteners voor storten en opnemen
depositButton.addEventListener('click', function () {
    const amount = parseFloat(amountInput.value);
    if (!isNaN(amount) && amount > 0) {
        updateBalance(amount, 'Storting');
    } else {
        alert('Ongeldig bedrag voor storting');
    }
    amountInput.value = '';
});

withdrawButton.addEventListener('click', function () {
    const amount = parseFloat(amountInput.value);
    if (!isNaN(amount) && amount > 0) {
        if (amount <= balance) {
            updateBalance(amount, 'Opname');
        } else {
            alert('Onvoldoende saldo voor opname');
        }
    } else {
        alert('Ongeldig bedrag voor opname');
    }
    amountInput.value = '';
});