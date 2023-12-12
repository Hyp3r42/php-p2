function toonTafel(getal) {
    document.write("<h2>Tafel van " + getal + "</h2>");
  
    for (let i = 1; i <= 10; i++) {
      let resultaat = i * getal;
      document.write(i + " x " + getal + " = " + resultaat + "<br>");
    }
  }
  
  // Roep de functie aan voor verschillende tafels
  toonTafel(5); // Tafel van 5
  toonTafel(8); // Tafel van 8
  toonTafel(12); // Tafel van 12