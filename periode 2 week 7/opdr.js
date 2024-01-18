const weerFormulier = document.getElementById('weer-formulier');
const locatieInvoer = document.getElementById('locatie');
const weerGegevensContainer = document.getElementById('weer-gegevens');
const foutmeldingContainer = document.getElementById('foutmelding');
const weerIcoonContainer = document.getElementById('weer-icoon');

const apiKey = 'dafa8bb5342b875a0088f1d1e217361f';

weerFormulier.addEventListener('submit', handleFormulierIndiening);

// Laad laatst opgevraagde locatie bij het herladen van de pagina
window.addEventListener('load', () => {
    const laatsteLocatie = localStorage.getItem('laatsteLocatie');
    if (laatsteLocatie) {
        locatieInvoer.value = laatsteLocatie;
        haalEnToonWeerData(laatsteLocatie);
    }
});

async function handleFormulierIndiening(e) {
    e.preventDefault();
    const locatie = locatieInvoer.value.trim();

    if (!locatie) {
        toonFoutmelding('Voer alstublieft een plaatsnaam in.');
        return;
    }

    haalEnToonWeerData(locatie);
}

async function haalEnToonWeerData(locatie) {
    try {
        const weerData = await haalWeerDataOp(locatie);
        toonWeerGegevens(weerData);
        toonWeerIcoon(weerData.weather[0].icon);
        localStorage.setItem('laatsteLocatie', locatie); // Sla de laatst opgevraagde locatie op
    } catch (fout) {
        toonFoutmelding('Fout bij het ophalen van weerdata. Probeer het opnieuw.');
        console.error(fout);
    }
}

async function haalWeerDataOp(locatie) {
    const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${locatie}&appid=${apiKey}&units=metric`);

    if (!response.ok) {
        throw new Error('Kan weerdata niet ophalen.');
    }

    return await response.json();
}

function toonWeerGegevens(gegevens) {
    weerGegevensContainer.innerHTML = `
        <p><strong>Temperatuur:</strong> <span id="temperatuur">${gegevens.main.temp}</span> Â°C</p>
        <p><strong>Luchtvochtigheid:</strong> <span id="luchtvochtigheid">${gegevens.main.humidity}</span> %</p>
        <p><strong>Omschrijving:</strong> <span id="omschrijving">${gegevens.weather[0].description}</span></p>
        <p><strong>Wind:</strong> <span id="windsnelheid">${gegevens.wind.speed}</span> m/s</p>
        <p><strong>Zonsopgang:</strong> <span id="zonsopgang">${formatteerTijd(gegevens.sys.sunrise)}</span></p>
        <p><strong>Zonsondergang:</strong> <span id="zonsondergang">${formatteerTijd(gegevens.sys.sunset)}</span></p>
    `;
    weerGegevensContainer.style.display = 'block';
    foutmeldingContainer.style.display = 'none';
}

function formatteerTijd(timestamp) {
    const tijd = new Date(timestamp * 1000);
    return tijd.toLocaleTimeString('nl-NL', { hour: '2-digit', minute: '2-digit' });
}

function toonFoutmelding(boodschap) {
    foutmeldingContainer.textContent = boodschap;
    foutmeldingContainer.style.display = 'block';
    weerGegevensContainer.style.display = 'none';
    weerIcoonContainer.style.display = 'none';
}

function toonWeerIcoon(icoonCode) {
    weerIcoonContainer.innerHTML = `<img src="http://openweathermap.org/img/wn/${icoonCode}.png" alt="Weer icoon">`;
    weerIcoonContainer.style.display = 'block';
}