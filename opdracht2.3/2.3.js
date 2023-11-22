var pos = 0;
var direction = 1; // 1 voor naar rechts, -1 voor naar links
var id = setInterval(frame, 10);

function frame() {
    if (pos >= window.innerWidth - 50) { // 50 is de breedte van het div-element
        direction = -1; // verander richting naar links
    } else if (pos <= 0) {
        direction = 1; // verander richting naar rechts
    }
    
    pos += direction; // voeg de richting toe aan de positie

    document.getElementById("myDiv").style.left = pos + "px";
}

// Voeg een klikgebeurtenis toe aan het div-element
document.getElementById("myDiv").addEventListener("click", function() {
    // Genereer willekeurige RGB-waarden voor kleurverandering
    var red = Math.floor(Math.random() * 256);
    var green = Math.floor(Math.random() * 256);
    var blue = Math.floor(Math.random() * 256);

    // Verander de achtergrondkleur van het div-element
    document.getElementById("myDiv").style.backgroundColor = `rgb(${red},${green},${blue})`;
});